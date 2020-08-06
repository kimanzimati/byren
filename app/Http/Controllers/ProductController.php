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
        $product = Product::where('slug', $slug)->first();
        return view('product.show')->with('product',$product);
    }
    private function validateData(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'distributor_price' => 'nullable',
                'manufacturer_price' => 'nullable',
                'retail_price' => 'required',
                'category' => 'required|integer',
                'sku' => 'required|nullable|string|max:255|unique:products',
                'variation' => 'required|string',
                'description' => 'nullable|string',
                'image' => 'required|image'
            ]
        );
    }

        public function store(Request $request)
    {
        $this->validateData($request);

        DB::beginTransaction();
        try {
            $product = Product::create(
                [
                    'name' => $request->name,
                    'distributor_price' => $request->input('distributor_price', 0),
                    'manufacturer_price' => $request->input('manufacturer_price', 0),
                    'retail_price' => $request->retail_price,
                    'sku' => $request->input('sku', null),
                    'variation' => $request->variation,
                    'description' => $request->input('description', null),
                ]
            );

            $product->categories()->attach($request->category);

            if ($request->hasFile('image')) {
                if (!is_dir(public_path('/product_images'))) {
                    mkdir(public_path('/product_images', 0777));
                }

                $image = $request->file('image');

                $image_name = time() . "." . $image->getClientOriginalExtension();

                if ($image->move(public_path('/product_images'), $image_name)) {
                    $uploaded = Image::create(
                        [
                            'image_url' => "/product_images/{$image_name}"
                        ]
                    );

                    $product->images()->attach($uploaded->id);
                }
            }
        } catch (\Exception $e) {
            $this->logEXception($e);
            DB::rollback();
            return back()->with('error', 'Error creating new product. Please try again');
        }

        DB::commit();

        return redirect()->back()->with('success', 'Product added successfully.');
    }

}
