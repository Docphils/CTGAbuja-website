<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    //
    //
    public function index()
    {
        $clergy = Worker::where('position', 'clergy')->get();
        $otherWorkers = Worker::where('position', 'other_workers')->get();

        return view('workers.index', compact('clergy', 'otherWorkers'));
    }

    public function create()
    {
        return view('workers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'type' => 'required|in:clergy,other_workers',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Worker::create([
            'title' => $request->title,
            'position'=> $request->position,
            'image_path' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('workers.index')->with('success', 'Worker updated successfully.');
    }

    public function show(Worker $worker)
    {
        return view('workers.show', compact('worker'));
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect()->route('workers.index')->with('success', 'Worker deleted successfully.');
    }
}
