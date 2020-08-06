<?php

namespace App\Http\Controllers;

use App\ForSale;
use Illuminate\Http\Request;

class ForSaleController extends Controller
{
    //
        public function index(){
            $forsale = ForSale::inRandomOrder()->take(8)->get();
            return view('product.index')->with('products', $forsale);
        }
}
