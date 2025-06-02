<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        return view('welcome', ['tasks' => Task::all()]);
    }

    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => ['required', 'numeric', 'in:1,2,3,4'],
            'state' => 'required',
            'time_estimated' => ['required', 'numeric'],
            'time_spent' => ['required', 'numeric'],
            'completed_at' => ['nullable', 'date_format:Y-m-d H:i:s'],
            'project_id' => 'nullable'
        ]);

        if ($request->project_id) {
            $project = Project::find($request->project_id);

            $project->tasks()->create($validated);
        } else {
            Task::create($validated);
        }

        session()->flash('success', 'post created');

        return redirect()->route('home');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Task $task, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => ['required', 'numeric', 'in:1,2,3,4'],
            'state' => 'required',
            'time_estimated' => ['required', 'numeric'],
            'time_spent' => ['required', 'numeric'],
            'completed_at' => ['nullable', 'date_format:Y-m-d H:i:s'],
            'project_id' => 'nullable'
        ]);

        $task->update($validated);

        return redirect()->route('tasks.show', ['task' => $task]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('home');
    }
}
