<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Log;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateProducts = $request->validate([
            'name' => 'required|string|max:255',
            'reference' => 'required|string|unique:products,reference|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);
        Product::create($validateProducts);
        return redirect()->route('products.index')->with('success', '[+] The Product Added seccusfrully.');
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
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'reference' => 'required|string|unique:products,reference,'.$product->id.'|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);
        $product->update($validate);
        return redirect()->route('products.index')->with('success', '[+] The Product Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->with('seccus', '[+] The Products Removed Seccussfully.');
        } catch (Exception $e) {
            return redirect()->route('products.index')->with('error', '[!] Error ' . $e->getMessage());
        }
    }
}
