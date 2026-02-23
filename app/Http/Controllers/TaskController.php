<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {

    $tasks = auth()->user()->tasks;
    return view('tasks.index', compact('tasks'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('tasks.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string|max:255',
      'status' => 'required|in:completed,pending',
    ]);
    Task::create(
      [
        'title' => $request->title,
        'description' => $request->description,
        'status' => $request->status,
        'user_id' => Auth()->id()
      ]
    );
    return redirect('/tasks')->with('status', 'Task Created Successfully');
  }

 
  public function show(Task $task)
  {
    return view('tasks.show', compact('task'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Task $task)
  {
    abort_if($task->user_id !== auth()->id(), 403);
    return view('tasks.edit', compact('task'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Task $task)
  {
     abort_if($task->user_id !== auth()->id(), 403);
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string|max:255',
      'status' => 'required|in:completed,pending'
    ]);
    $task->update([
      'title' => $request->title,
      'description' => $request->description,
      'status' => $request->status
    ]);
    return redirect('/tasks')->with('status', 'Task Updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
public function destroy(Task $task)
{
    abort_if($task->user_id !== auth()->id(), 403);

    $task->delete();

    return redirect('/tasks')->with('status', 'Task Deleted Successfully');
}

}
