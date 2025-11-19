<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index () {
        return Inertia::render('products/index',[]);
    }

       public function create () {
        return Inertia::render('products/Create',[]);
    }
     public function store(Request $request)
    {
        // Store logic here
    }

    public function show($id)
    {
        return Inertia::render('products/Show', [
            'id' => $id,
        ]);
    }

    public function edit($id)
    {
        return Inertia::render('products/Edit', [
            'id' => $id,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Update logic here
    }

    public function destroy($id)
    {
        // Delete logic here
    }
}
