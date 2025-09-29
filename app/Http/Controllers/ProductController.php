<?php

namespace App\Http\Controllers;

use App\Models\Product;
use \Illuminate\Http\Response;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        return response()->json(['product' => $product], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json(['product' => $product], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response()->json(['product' => $product], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['product' => $product], Response::HTTP_ACCEPTED);
    }
}
