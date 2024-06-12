<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    //
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(16);
        return view('gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    { 
        $request->validate([
            'title' => 'required|string|max:255',
            'image_path.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg', // Adjust max file size as needed
            'description' => 'nullable|string',
        ]);
        
        $uploadedImages = [];
        foreach ($request->file('image_path') as $image) {
            $imagePath = $image->store('images', 'public');
            $uploadedImages[] = $imagePath;
        }

        foreach ($uploadedImages as $imagePath) {
            Gallery::create([
                'title' => $request->title,
                'image_path' => $imagePath,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('gallery.index')->with('success', 'Gallery item created successfully.');
    }

    public function show(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Gallery item deleted successfully.');
    }
}
