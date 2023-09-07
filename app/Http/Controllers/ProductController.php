<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use ZipArchive;

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
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image'       => 'required|image|max:1024',
            'music'       => 'required|file',
            'marker'      => 'required|file|mimes:zip|max:1024',
            'model'      => 'required|file',
        ]);

        $marker = $request->file('marker')->store('markers-zip');
        // // unzip the file
        // $zip = new ZipArchive;
        // $zip->open(storage_path('app/' . $marker));
        // $zip->extractTo(storage_path('app/markers/' . str($request->name)->slug()));
        // // foreach the files and get the name of a file with format fset
        // $files = [];

        // $zip->close();

        // unzip the file, and get the name of the file inside the zip that has the format fset
        $zip = new ZipArchive;
        $zip->open(storage_path('app/' . $marker));
        $files = [];
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $filename = $zip->getNameIndex($i);
            if (str_ends_with($filename, '.fset')) {
                $files[] = $filename;
            }
        }
        $zip->extractTo(storage_path('app/markers/' . str($request->name)->slug()));
        $zip->close();

        // remove the file format
        $files = array_map(function ($file) {
            return str_replace('.fset', '', $file);
        }, $files);

        $product = Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $request->file('image')->store('images'),
            'music'       => $request->file('music')->store('music'),
            'marker'      => 'markers/' . str($request->name)->slug() . '/' . $files[0],
            'model'      => $request->file('model')->store('models'),
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
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
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image'       => 'nullable|image|max:1024',
            'music'       => 'nullable|file|max:1024',
            'marker'      => 'nullable|file|mimes:zip',
            'model'      => 'nullable|file',
        ]);

        if ($request->hasFile('marker')) {
            $marker = $request->file('marker')->store('markers');
            // unzip the file and get the name of the file inside the zip that has the format fset
            $zip = new ZipArchive;
            $zip->open(storage_path('app/' . $marker));
            $files = [];
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                if (str_ends_with($filename, '.fset')) {
                    $files[] = $filename;
                }
            }
            $zip->extractTo(storage_path('app/markers/' . str($request->name)->slug()));
            $zip->close();

            // remove the file format
            $files = array_map(function ($file) {
                return str_replace('.fset', '', $file);
            }, $files);

            $marker = 'markers/' . str($request->name)->slug() . '/' . $files[0];
        }

        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $request->hasFile('image') ? $request->file('image')->store('images') : $product->image,
            'music'       => $request->hasFile('music') ? $request->file('music')->store('music') : $product->music,
            'marker'      => $request->hasFile('marker') ? $marker : $product->marker,
            'model'      => $request->hasFile('model') ? $request->file('model')->store('models') : $product->model,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
