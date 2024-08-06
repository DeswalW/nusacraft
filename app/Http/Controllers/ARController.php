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
        return view('nusacraft', compact('products'));
    }

    // Halaman Detail Beli
    public function beli()
    {
        $products = Product::all();
        return view('detailproduct', compact('products'));
    }

    /**
     * Display product
     */
    public function show(Product $product)
    {
        return view('ar.mindar', compact('product'));
    }

    public function detail(Product $product)
    {
        return view('ar.detail', compact('product'));
    }
}
