<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Paginate 10 items per page
        $tasks = Task::orderBy('created_at', 'desc')->paginate(10);
        return view('todo', compact('tasks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'due_date' => 'required|date',
            'priority' => 'required|string',
        ]);

        Task::create($data);
        return redirect()->back()->with('success', 'Task Created!');
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'due_date' => 'required|date',
            'priority' => 'required|string',
            'status' => 'required|string',
        ]);

        $task->update($data);
        return redirect()->back()->with('success', 'Task Updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('success', 'Task Deleted!');
    }
}