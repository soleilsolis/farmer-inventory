<?php

namespace App\Http\Controllers;

use App\Models\ProductTypeVariant;
use App\Http\Requests\StoreProductTypeVariantRequest;
use App\Http\Requests\UpdateProductTypeVariantRequest;

use App\Models\Image;
use App\Models\Product;
use Faker\Generator as Faker;

use Illuminate\Http\Request;

class ProductTypeVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = Product::find($request->id);

        return view('productTypeVariant-new', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductTypeVariantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeVariantRequest $request, Faker $faker)
    {
        $data = ProductTypeVariant::create([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'price' => $request->price,
        ]);

        $data->product_id = $data->product->id;

        ImageController::store($request->file('image'), $data->id, 'App\Models\ProductTypeVariant');

        return response()->json(compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductTypeVariant  $productTypeVariant
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTypeVariant $productTypeVariant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTypeVariant  $productTypeVariant
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTypeVariant $productTypeVariant, Request $request)
    {
        $productTypeVariant = $productTypeVariant->find($request->id);

        return view('productTypeVariant-edit', compact('productTypeVariant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductTypeVariantRequest  $request
     * @param  \App\Models\ProductTypeVariant  $productTypeVariant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductTypeVariantRequest $request, ProductTypeVariant $productTypeVariant)
    {
        $data = $productTypeVariant->findOrFail($request->id);
        $data->name = $request->name;
        $data->price = $request->price;

        if($request->file('image')) {
            ImageController::store($request->file('image'), $data->id, 'App\Models\ProductTypeVariant');
        }

        $data->save();

        return response()->json(compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTypeVariant  $productTypeVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTypeVariant $productTypeVariant, Request $request)
    {
        $productTypeVariant = $productTypeVariant->find($request->id);
        $productTypeVariant->delete();
    }
}
