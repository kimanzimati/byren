<?php

namespace App\Http\Controllers;

use App/Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    //for sale controller
    public function index(){
        $forsale = forsale::inRandomOrder()->take(8)->get();
        return view('product.index')->with('products', $forsale);
    }

}
