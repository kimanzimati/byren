<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class AddProductController extends Controller
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
        $product = AddProductController::with("name")->latest()->paginate(8);
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
         return \view('product.show', \compact('product'));
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
    public function store(StoreProduct $request)
    {
        $validatedProduct = $request->validated();
        AddProductController::create(array_merge($validatedProduct, ["id" => auth()->user()->id]));
        return \redirect('/posts');
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
            $product = AddProductController::findOrFail($id);
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
    public function update(StoreProduct $request, $id)
    {
        $validatedProduct = $request->validated();
        $product = AddProductController::find($id);
        $product->update($validatedProduct);
        return \redirect("product/$id");
    }

    /**
     * deletes a specific post
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        try {
            $product = AddProductController::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        return (auth()->user()->id !== (int) $product->user_id) ? $this->redirectNonProductOwner() :
        (function () use ($product) {
            $product->delete();
            return \redirect()->back();
        })();
    }

    /**
     * redirect users if they don't own a resource
     *
     * @return void
     */
    protected function redirectNonProductOwner()
    {
        return \redirect()->back()->with('failure', 'Unauthorized action');
    }
}
