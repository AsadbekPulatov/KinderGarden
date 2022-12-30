<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Retsep;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class RetsepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $ovqat = Menu::find($id);
        $mahsulotlar = Warehouse::all();
        $retsep = Retsep::where('menu_id', $id)->get();
        return view('admin.retsep.index', compact('retsep', 'ovqat', 'mahsulotlar'));
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
        Retsep::create($request->all());
        return redirect()->back()->with('success', 'Retsep qo\'shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Retsep  $retsep
     * @return \Illuminate\Http\Response
     */
    public function show(Retsep $retsep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Retsep  $retsep
     * @return \Illuminate\Http\Response
     */
    public function edit(Retsep $retsep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Retsep  $retsep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retsep $retsep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Retsep  $retsep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retsep $retsep)
    {
        //
    }
}
