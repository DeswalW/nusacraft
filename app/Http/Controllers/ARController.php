<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ARController extends Controller
{
    /**
     * Home page.
     */
    public function index()
    {
        $products = Product::all();

        return view('home', compact('products'));
    }

    /**
     * Display product
     */
    public function show(Product $product)
    {
        return view('ar.show', compact('product'));
    }
}
