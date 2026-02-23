<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $tasksCount = Task::count();
        $completedCount = Task::where('status', 'completed')->count();
        $pendingCount = Task::where('status', 'pending')->count();

        $latestUsers = User::latest()->take(5)->get();

        return view('admin.index', compact(
            'usersCount', 'tasksCount', 'completedCount', 'pendingCount', 'latestUsers'
        ));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'User created!');
    }

 public function show($id)
{
    $user = User::with('tasks')->findOrFail($id);
    return view('admin.show', compact('user'));
}

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        
        $user->update($request->only('name', 'email'));
        return redirect()->route('admin.dashboard')->with('success', 'User updated');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('status', 'User deleted');
    }
}