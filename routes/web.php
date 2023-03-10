<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.master');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('statistic', [StatisticController::class, 'index'])->name('statistic.index')->middleware('zouch');
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('children', \App\Http\Controllers\ChildrenController::class)->middleware('admin');
    Route::resource('groups', \App\Http\Controllers\GroupController::class)->middleware('zouch');
    Route::resource('menu', \App\Http\Controllers\MenuController::class)->middleware('zouch');
    Route::resource('retsep', \App\Http\Controllers\RetsepController::class)->middleware('zouch');
    Route::resource('warehouse', \App\Http\Controllers\WarehouseController::class)->middleware('zouch');
    Route::resource('foods', \App\Http\Controllers\FoodController::class)->middleware('zouch');
    Route::resource('attendance', \App\Http\Controllers\AttendanceController::class);
    Route::get('menulist', [\App\Http\Controllers\MenuListController::class, 'index'])->middleware('tarbiyachi')->name('menu_list');
    Route::get('davomat',[\App\Http\Controllers\OshpazController::class,'index'])->middleware('oshpaz')->name('davomat');
    Route::get('warehouselist',[\App\Http\Controllers\OshpazController::class,'store'])->middleware('oshpaz')->name('warehouse_list');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
