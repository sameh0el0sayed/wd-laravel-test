<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    //Get data by text search
    public function getFood(Request $request)
    {
        $text = $request->text;


            $data = DB::table('categories')
                ->join('food', 'categories.id', '=', 'food.category_id')
                ->select('categories.name as ctname', 'food.name', 'food.price')
                ->groupBy('categories.name', 'food.name', 'food.price')
                ->where('food.name', 'like', '%' . $text . '%')
                ->orderByDesc('categories.name')
                ->take(50)
                ->get();

            echo json_encode($data);

    }
    //Get data top 6
    public function getFoodtop()
    {
            $data = DB::table('categories')
                ->join('food', 'categories.id', '=', 'food.category_id')
                ->select('categories.name as ctname', 'food.name', 'food.price')
                ->groupBy('categories.name', 'food.name', 'food.price')
                 ->take(6)
                ->get();

            echo json_encode($data);

    }


}
