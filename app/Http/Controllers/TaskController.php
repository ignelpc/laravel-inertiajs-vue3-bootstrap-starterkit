<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Tasks/Index', ['tasks' => Task::paginate(5)]);

        // return Inertia::render('Tasks/Index', ['tasks' => Task::paginate(4)->map(function ($task) {
        //     return [
        //         'id' => $task->id,
        //         'title' => $task->title,
        //         'description' => $task->description,
        //         'created_at' => $task->created_at,
        //     ];
        // })]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:tasks|min:3',
            'description' => 'required|min:5'
        ]);

        $task = Task::create($validated);

        return (!$task) ?
            Redirect::route('tasks.index')->with('error', "Failure to create task")
            : Redirect::route('tasks.index')->with('success', "Successfully created {$task->title}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return Inertia::render('Tasks/Edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5'
        ]);

        return $task->update($validated) ?
            Redirect::route('tasks.index')->with('success', 'Task updated successfully')
            : Redirect::route('tasks.index')->with('error', 'Failure to update task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        return $task->delete() ?
            redirect()->back()->with('success', 'Task deleted successfully')
            : redirect()->back()->with('error', 'Failure to delete task');
    }
}
