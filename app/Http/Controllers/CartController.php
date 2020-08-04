<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('cart.index');
    }

    public function store(Request $request){
        $duplicate = \Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id == $request->id;
        });

        if($duplicate->isNotEmpty()){
            return redirect('/cart')->with('success', 'Item is already in your cart!');
        }
    }
    public function store(Request $request){
        \Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return redirect('/cart')->with('success', 'Item was added to your cart!');
    }

    public function destroy($id){
        \Cart::remove($id);
        return back()->with('success', 'Item has been removed!');
    }
/*|-------saveforlater*/
    public function saveForLater($id){
        \Cart::remove($id);
        \Cart::instance('saveForLater')->add($item->id, $item->name, $item->price)->associate(App\Product);
        return redirect(('/cart')->with('success',;Item has been saved for later));
    }
}
