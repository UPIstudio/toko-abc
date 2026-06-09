<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_code' => 'required|unique:products',
            'name' => 'required',
            'category' => 'required',
            'stock' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:1',
            'expired_date' => 'nullable|date',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_code' => 'required|unique:products,product_code,' . $product->id,
            'name' => 'required',
            'category' => 'required',
            'stock' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:1',
            'expired_date' => 'nullable|date',
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
