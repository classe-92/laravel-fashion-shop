<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Texture;
use App\Models\Category;
use App\Models\Color;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $textures = Texture::all();
        return view('admin.products.create', compact('categories', 'brands', 'textures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductRequest  $request
     *
     */
    public function store(StoreproductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     *
     */
    public function show(product $product)
    {
        return view('admin.products.show', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     *
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $textures = Texture::all();
        $data = [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
            'textures' => $textures
        ];
        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\product  $product
     *
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     *
     */
    public function destroy(product $product)
    {
        if ($product->image) {
            $datogliere = "http://127.0.0.1:8000/storage/";
            $imagetoremove = str_replace($datogliere, '', $product->image);
            //dd($imagetoremove);
            Storage::delete($imagetoremove);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', "$product->name deleted successfully.");
    }
}