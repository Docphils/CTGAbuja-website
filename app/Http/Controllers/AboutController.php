<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Worker;
use App\Models\Gallery;



class AboutController extends Controller
{
    public function index()
    {
        $latestGalleries = Gallery::latest()->take(8)->get();
        $clergy = Worker::where('type', 'clergy')->get();
        $otherWorkers = Worker::where('type', 'other_workers')->get();
        $about = About::first();
        return view('abouts.index', compact('about', 'otherWorkers', 'clergy', 'latestGalleries'));
    }

    public function edit()
    {
        $about = About::first();
        return view('abouts.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'history' => 'required',
        ]);

        $about = About::first();
        if (!$about) {
            $about = new About();
        }
        $about->history = $request->input('history');
        $about->save();

        return redirect()->route('abouts.index')->with('success', 'History updated successfully');
    }
}