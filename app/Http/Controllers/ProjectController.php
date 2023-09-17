<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Image;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $caterogies = Category::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->get();
        return view('/projects', compact('projects', 'caterogies'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caterogies = Category::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->get();
        return view('/createproject', compact('projects', 'caterogies'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Maak het project aan
        $request->validate([
            'category_id' => 'required',
            'description' => 'required',
            'title' => 'required',
            'user_id' => 'required',
        ]);

        $project = Project::create($request->post());

        //Maak de image aan en link hem aan het project

        if($request->image != NULL){        
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);

            Image::create([
                'image' => $imageName,
                'project_id' => $project->id,
            ]);
        }

        return $this->index();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('/project', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
