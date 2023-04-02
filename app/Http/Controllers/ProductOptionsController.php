<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOptions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $product = Product::findOrFail($id);
        return view('product-options.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($product_id, Request $request)
    {
        $inputs = $request->all();
        $inputs['product_id'] = $product_id;
        ProductOptions::create($inputs);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductOptions $productOptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductOptions $productOptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductOptions $productOptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductOptions $productOptions)
    {
        //
    }
}
