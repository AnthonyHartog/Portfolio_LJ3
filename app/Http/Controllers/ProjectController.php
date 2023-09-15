<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $caterogies = Category::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->get();
        return view('/project', compact('projects', 'caterogies'));   
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
