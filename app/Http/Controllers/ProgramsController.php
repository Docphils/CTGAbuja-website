<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramImage;
use Illuminate\Http\Request;
use App\Models\Registration;

class ProgramsController extends Controller
{
    public function index()
    {
        $pastPrograms = Program::where('is_upcoming', false)->with('images')->orderBy('created_at', 'desc')->paginate(3);
        $upcomingPrograms = Program::where('is_upcoming', true)->get();

        return view('programs.index', compact('pastPrograms', 'upcomingPrograms'));
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

        Registration::create([
            'program_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,

        ]);

        return redirect()->route('programs.index')->with('success', 'Registration successful');
    }

    public function registrations($id)
    {
        $program = Program::with('registrations')->findOrFail($id);
        return view('programs.registrations', compact('program'));
    }

}
