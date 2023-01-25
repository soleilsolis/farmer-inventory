<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use App\Models\ProductType;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\ImageController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::limit(10)->get();

        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = ProductType::all();

        return view('product-new', compact('productTypes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'product_type_id' => $request->product_type_id,
        ]);

        ImageController::store($request->file('image'), $data->id, 'App\Models\Product');

        return response()->json(compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request)
    {
        $product = $product->findOrFail($request->id);
        $productTypes = ProductType::all();
        $variant = $request->variant_id ? Variant::findOrFail($request->variant_id) : null;
        $productsRandom = Product::inRandomOrder()->limit(5)->get();

        return view('product-show', compact('product', 'productTypes', 'variant','productsRandom'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Request $request)
    {
        $product = $product->findOrFail($request->id);
        $productTypes = ProductType::all();

        return view('product-edit', compact('product', 'productTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $product->findOrFail($request->id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->product_type_id = $request->product_type_id;

        if($request->file('image')) {
            ImageController::store($request->file('image'), $data->id, 'App\Models\Product');
        }

        $data->save();

        return response()->json(compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        $data = $product->findOrFail($request->id);
        $data->delete();

        return response()->json([]);
    }
}
