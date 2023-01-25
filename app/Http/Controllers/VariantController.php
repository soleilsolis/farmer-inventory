<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use App\Http\Requests\StoreVariantRequest;
use App\Http\Requests\UpdateVariantRequest;

use App\Models\Image;
use App\Models\Product;
use Faker\Generator as Faker;

use Illuminate\Http\Request;

class VariantController extends Controller
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

        return view('variant-new', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVariantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVariantRequest $request, Faker $faker)
    {
        $data = Variant::create([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'price' => $request->price,
        ]);

        $data->product_id = $data->product->id;

        ImageController::store($request->file('image'), $data->id, 'App\Models\Variant');

        return response()->json(compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function show(Variant $variant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function edit(Variant $variant, Request $request)
    {
        $variant = $variant->find($request->id);

        return view('variant-edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVariantRequest  $request
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVariantRequest $request, Variant $variant)
    {
        $data = $variant->findOrFail($request->id);
        $data->name = $request->name;
        $data->price = $request->price;

        if($request->file('image')) {
            ImageController::store($request->file('image'), $data->id, 'App\Models\Variant');
        }

        $data->save();

        return response()->json(compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variant $variant, Request $request)
    {
        $variant = $variant->find($request->id);
        $variant->delete();

        
    }
}
