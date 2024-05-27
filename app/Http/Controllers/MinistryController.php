<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministry;

class MinistryController extends Controller
{

    public function index()
    {
        $ministries = Ministry::all();
        return view('ministries.index', compact('ministries'));
    }

    public function show($id)
    {
        $ministry = Ministry::findOrFail($id);
        return view('ministries.show', compact('ministry'));
    }

    public function create()
    {
        return view('ministries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Ministry::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $imagePath,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
        ]);

        return redirect()->route('ministries.index')->with('success', 'Ministry created successfully.');
    }

    public function edit($id)
    {
        $ministry = Ministry::findOrFail($id);
        return view('ministries.edit', compact('ministry'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
        ]);

        $ministry = Ministry::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $ministry->image_path = $imagePath;
        }

        $ministry->update([
            'name' => $request->name,
            'description' => $request->description,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
        ]);

        return redirect()->route('ministries.index')->with('success', 'Ministry updated successfully.');
    }

    public function destroy($id)
    {
        $ministry = Ministry::findOrFail($id);
        $ministry->delete();

        return redirect()->route('ministries.index')->with('success', 'Ministry deleted successfully.');
    }
}


?>