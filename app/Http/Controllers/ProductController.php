<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()->take(8)->get();
        return view('product.index')->with('products', $products);
    }

    public function show($slug){
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product.show')->with('product',$product);
    }
}
