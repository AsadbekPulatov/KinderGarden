<?php

namespace App\Http\Controllers;

use App\Models\Outlay;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        if (isset($from_date)){
            $outlays = Outlay::whereBetween('date', [$from_date, $to_date])->get();
        } else {
            $outlays = Outlay::whereBetween('date', [$from_date, $to_date])->get();
        }
        $sum = array();
        foreach ($outlays as $outlay){
            $sum[$outlay->warehouse_id]['count'] = 0;
            $sum[$outlay->warehouse_id]['name'] = $outlay->warehouse->name;
            $sum[$outlay->warehouse_id]['type'] = $outlay->warehouse->type;
        }
        foreach ($outlays as $outlay){
            $sum[$outlay->warehouse_id]['count'] += $outlay->count;
        }
        $outlays = $sum;
        return view('admin.statistic', compact('outlays'));
    }
}
