<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOptions;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $products = Product::with('options')->where('status', 1);
        if (!is_null($request->properties)) {
            $products = $this->filterBy($products, $request->properties);
        }
        $products = $products->simplePaginate(40);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function filterBy($query, $filterBy)
    {
        $valuesArr = [];
        foreach ($filterBy as $key => $values)
        {
            foreach ($values as $value)
            {
                $valuesArr[] = $value;
            }
        }
        return Product::whereIn('id', ProductOptions::whereIn('key', array_keys($filterBy))->whereIn('value', $valuesArr)->pluck('product_id')->toArray());
    }

}
