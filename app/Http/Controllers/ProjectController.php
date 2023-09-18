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
        return view('projects', compact('projects', 'caterogies'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caterogies = Category::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->get();
        return view('createproject', compact('projects', 'caterogies'));   
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

        //Kijk of er een image mee is gegeven
        if($request->images != NULL && $request->hasFile('images')){  
            //Loop erdoorheen   
            foreach($request->images as $image){
                //Sla de image op
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
    
                Image::create([
                    'image' => $imageName,
                    'project_id' => $project->id,
                ]);
            }   
        }

        return redirect()->route('projects.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('project', compact('project'));
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
    public function destroy(Project $project)
    {
        $images = Image::where('project_id', $project->id)->get();
        foreach($images as $image){
            $image->delete();
        }

        $project->delete();

        return redirect()->route('projects.index');
    }
}
