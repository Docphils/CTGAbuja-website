<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Program;
use App\Models\SermonVideo;
use App\Models\Contact;
use App\Models\Ministry;
use App\Models\Worker;






class UserController extends Controller
{
    
    public function dashboard()
    {
        $userCount = User::count();
        $sermons = SermonVideo::count();
        $upcomingPrograms = Program::where('is_upcoming', true)->count();
        $contactMessages = Contact::count();
        $workers = Worker::where('type', 'other_workers')->count();
        $clergy = Worker::where('type', 'clergy')->count();
        $ministries = Ministry::count();

        return view('dashboard', compact('userCount', 'sermons', 'upcomingPrograms', 'contactMessages', 'workers', 'clergy', 'ministries'));
    }
    
    public function index()
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
}