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
            $sum[$outlay->name] = 0;
        }
        foreach ($outlays as $outlay){
            $sum[$outlay->name] += $outlay->count;
        }
        $outlays = $sum;
        return view('admin.statistic', compact('outlays'));
    }
}
