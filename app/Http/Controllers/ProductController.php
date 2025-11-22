<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index () {
        $products = Product::latest()->paginate(10);
        return Inertia::render('products/index',compact('products'));
        // or ['product' => $product]
    }

    public function create () {
        return Inertia::render('products/Create',[]);
    }
    public function store (request $request) {
        $attributes = $request->validate([
            'title'=> ['required','string','max:255'],
            'price' =>['required','numeric','min:0'],
            'description'=> ['nullable','string','max:255'],

        ]);
        Product::create($attributes);
        return redirect()->route('productsIndex')->with('message', "Product added successfully");
    }
    public function Edit (Product $product){
        return Inertia::render('products/Edit',compact('product'));
    }
}
