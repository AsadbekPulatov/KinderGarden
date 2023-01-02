<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class MenuListController extends Controller
{
    public function index(){
        $date = date('w', strtotime(now()->timezone('Asia/Tashkent')));
        $menu = Food::where('week', $date)->get();
        return view('admin.menu-list', compact('menu'));
    }
}
