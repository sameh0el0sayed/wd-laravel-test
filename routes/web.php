<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
Route::get('/test/{text}', function ($text) {
    // $f=DB::table('categories')
    // ->join('food', 'categories.id', '=', 'food.category_id')
    // ->select('categories.name as ctname', 'food.name', 'food.price' ,'ROW_NUMBER() OVER(PARTITION BY Year) AS row_num')
    // ->where('food.name','like','%'.$text.'%')
    // ->groupBy('categories.name','food.name', 'food.price')
    // ->orderByDesc('categories.name')
    // ->get();
    $f= DB::table('categories')
    ->join('food', 'categories.id', '=', 'food.category_id')
    ->select('categories.name as ctname', 'food.name', 'food.price')
    ->groupBy('categories.name', 'food.name', 'food.price')
    ->where('food.name', 'like', '%' . $text . '%')
    ->orderByDesc('categories.name')
    ->get();
    return $f;
});

Route::post('Getfood',[App\Http\Controllers\FoodController::class, 'getFood'])->name('Getfood');
Route::get('Getfoodtop',[App\Http\Controllers\FoodController::class, 'getFoodtop'])->name('Getfoodtop');

