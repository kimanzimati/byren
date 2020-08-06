<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * returns all the available posts
     *
     * @return View
     */
    public function index()
    {
        $product = Product::latest()->paginate(8);
        return view('product.index', compact('product'));
    }
    /**
     * returns a single post item
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
         return view('product.show', compact('product'));
    }

    /**
     * returns view form to add an article
     *
     * @return void
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * stores new post
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        Product::create(array_merge($validatedProduct, ["id" => auth()->user()->id]));
        return \redirect('/product');
    }

    /**
     * returns view for editing a specific post
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
        return (auth()->user()->id !== (int) $product->id) ? $this->redirectNonPostOwner() : \view('product.edit', compact('product'));
    }

    /**
     * updates existing post
     *
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $validatedProduct = $request->validated();
        $product = Product::find($id);
        $product->update($validatedProduct);
        return \redirect("product/$id");
    }


}
