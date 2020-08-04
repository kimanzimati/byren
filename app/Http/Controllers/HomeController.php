<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::inRandomOrder()->take(8)->get();
        return view('main')->with('products', $products);
    }
}
