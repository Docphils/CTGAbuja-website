<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramImage;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Activity;
use App\Mail\ProgramsRegistrationEmail;
use Illuminate\Support\Facades\Mail;



class ProgramsController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        $pastPrograms = Program::where('is_upcoming', false)->with('images')->orderBy('created_at', 'desc')->paginate(2);
        $upcomingPrograms = Program::where('is_upcoming', true)->get();

        return view('programs.index', compact('pastPrograms', 'upcomingPrograms', 'activities'));
    }

    public function show($id)
    {
        $program = Program::with('images')->findOrFail($id);
        return view('programs.show', compact('program'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'is_upcoming' => 'required|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $program = Program::create($request->only('title', 'description', 'details', 'is_upcoming'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('program_images', 'public');
                ProgramImage::create([
                    'program_id' => $program->id,
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('programs.index')->with('success', 'Program created successfully');
    }

    public function edit($id)
    {
        $program = Program::with('images')->findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $program->update($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $program->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('programs.index')->with('success', 'Program updated successfully');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program deleted successfully');
    }

    public function registerForm($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.register', compact('program'));
    }

    public function register(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $registration = Registration::create([
            'program_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,

        ]);

        Mail::to($registration['email'])->queue(new ProgramsRegistrationEmail($registration));

        return redirect()->route('programs.index')->with('success', 'Registration successful');
    }

    public function registrations($id)
    {
        $program = Program::with('registrations')->findOrFail($id);
        return view('programs.registrations', compact('program'));
    }


    public function createActivity()
    {
        return view('activities.create');
    }

    public function storeActivity(Request $request)
    {
        $request->validate([
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'time_range' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        Activity::create($request->all());

        return redirect()->route('programs.index')->with('success', 'Activity created successfully.');
    }

    public function editActivity(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    public function updateActivity(Request $request, Activity $activity)
    {
        $request->validate([
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'time_range' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $activity->update($request->all());

        return redirect()->route('programs.index')->with('success', 'Activity updated successfully.');
    }

    public function destroyActivity(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('programs.index')->with('success', 'Activity deleted successfully.');
    }
}
