<?php

namespace App\Http\Controllers;

use App\Models\Children;
use App\Models\Group;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $children = Children::all();
        $groups = Group::all();
        return view('admin.children.index', compact('children','groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Children::create($request->all());
        return redirect()->back()->with('success', 'Child added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function show(Children $children)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function edit(Children $children)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Children $children)
    {
        $children = Children::find($request->id);
        $children->update($request->all());
        return redirect()->back()->with('success', 'Child updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $children = Children::find($id);
        $children->delete();
        return redirect()->back()->with('success', 'Child deleted successfully');
    }
}
