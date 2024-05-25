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
        $workers = Worker::all();
        
        return view('workers.index', compact('workers'));
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
            'name' => $request->name,
            'type'=> $request->type,
            'image_path' => $imagePath,
            'position' => $request->position,
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
