<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Category;

class TestController extends Controller
{
    public function products(){
        return response()->json(Product::all(), 200);
    }

    public function categories(){
        return response()->json(Category::all(), 200);
    }
}
