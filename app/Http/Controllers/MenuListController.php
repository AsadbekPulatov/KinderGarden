<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class MenuListController extends Controller
{
    public function index(){
        $date = date('Y-m-d', strtotime(now()->timezone('Asia/Tashkent')));
        $menu = Food::where('date', $date)->get();
        return view('admin.menu-list', compact('menu'));
    }
}
