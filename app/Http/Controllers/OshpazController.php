<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Children;
use App\Models\Food;
use App\Models\Retsep;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class OshpazController extends Controller
{
    public function index()
    {
        $children = Children::all();
        $attendances = Attendance::all();
        $children_count = $children->count();
        $attendances_count = $attendances->count();
        $child = $children_count - $attendances_count;
        $now = date('w', strtotime(now()));
        $foods = Food::where('week', $now)->get();
        $s = [];
        foreach ($foods as $food) {
            $s[] = $food->menu_id;
        }
//        dd($s);
        $retseps = Retsep::whereIn('menu_id', $s)->get();
        $sum = [];
        foreach ($retseps as $retsep) {
            $sum[$retsep->warehouse_id]['count'] = 0;
            $sum[$retsep->warehouse_id]['name'] = $retsep->warehouse->name;
            $sum[$retsep->warehouse_id]['id'] = $retsep->warehouse->id;
        }
        foreach ($retseps as $retsep) {
            $sum[$retsep->warehouse_id]['count'] += $retsep->count * $child;
        }
        return view('admin.oshpaz', compact('foods', 'child', 'sum'));
    }

    public function store(Request $request)
    {
        $warehouse_id = $request['warehouse_id'];
        $count_array = $request['count'];
        $sum = array_sum($request->check);
        $count = count($request->check);
        if ($sum == $count) {
            foreach ($warehouse_id as $key => $id) {
                $warehouse = Warehouse::find($id);
                $warehouse->count = $warehouse->count - $count_array[$key];
                $warehouse->save();
            }
            return redirect()->back()->with('success', 'Mahsulot qabul qilindi');
        } else {
            return redirect()->back()->with('error', 'Mahsulot yetarli emas');
        }
    }
}
