<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("product.create");
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            "title" => $request->title,
            'body' => $request->body
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {

        return view('product.edit', compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {

        Product::findOrFail($product->id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        product::find($product->id)->delete();
        return redirect()->route('product.index');
    }
}
