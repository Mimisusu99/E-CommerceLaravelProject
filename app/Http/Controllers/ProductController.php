<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function create_product()
    {
        return view('create_product');
    }

    public function store_product(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'price' => 'required',
           'stock' => 'required',
           'description' => 'required',
           'image' => 'required' 
        ]);

        $file = request->file('image');
        $path = time() . "_" . $request->name . '-' . $file->getClientOriginalExtention();

        Storage::disk('local')->put('public/' . $path, file_get_contents(file));

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path
        ]);

        return Redirect::route('create_product');
    }

    public function index_product()
    {
        $products = Product::all();
        return view('index_product', compact('products'));
    }

    public function show_product(Product $product)
    {
        return view('show_product', compact('product'));
    }

    public function edit_product(Product $product)
    {
        return view('edit_product', compact('product'));
    }

    public function update_product(Product $product, Request $request)
    {
        $request->validate([
           'name' => 'required',
           'price' => 'required',
           'stock' => 'required',
           'description' => 'required',
           'image' => 'required' 
        ]);

        $file = request->file('image');
        $path = time() . "_" . $request->name . '-' . $file->getClientOriginalExtention();

        Storage::disk('local')->put('public/' . $path, file_get_contents(file));

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path
        ]);

        return Redirect::route('show_product', $product);
    }

    public function delete_product(Product $product)
    {
        $product->delete();
        return Redirect::route('index_product');
    }
}