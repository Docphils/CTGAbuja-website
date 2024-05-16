<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function about(){
        
        return view('about');
    }

    public function ministries(){
        
        return view('ministries');
    }

    public function sermons(){
        
        return view('sermons');
    }

    public function programs(){
        
        return view('programs');
    }

    public function contact(){
        
        return view('contact');
    }
}
