<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('.projects.index', ['projects' => Project::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Project::create($validated);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('projects.show', ['project' => Project::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('projects.edit', ['project' => Project::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $project->update($validated);

        return redirect()->route('projects.show', ['project' => $project]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
