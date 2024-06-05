<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramImage;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function index()
    {
        $pastPrograms = Program::where('is_upcoming', false)->with('images')->get();
        $upcomingPrograms = Program::where('is_upcoming', true)->get();

        return view('programs.index', compact('pastPrograms', 'upcomingPrograms'));
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
            'registration_link' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $program = Program::create($request->only('title', 'description', 'details', 'is_upcoming', 'registration_link'));

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
}
