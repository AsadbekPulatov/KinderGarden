<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Menu;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        $menu = Menu::all();
        return view('admin.food.index', compact('foods','menu'));
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
        $week = date('w', strtotime($request->date));
        $food = new Food();
        $food->time = $request->time;
        $food->menu_id = $request->menu_id;
        $food->date = $request->date;
        $food->week = $week;
        $food->save();
        return redirect()->back()->with('success', 'Ovqat qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $week = date('w', strtotime($request->date));
        $food = Food::find($request->id);
        $food->time = $request->time;
        $food->menu_id = $request->menu_id;
        $food->date = $request->date;
        $food->week = $week;
        $food->save();
        return redirect()->back()->with('success', 'Ovqat yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->back()->with('success', 'Ovqat o`chirildi');
    }
}
