<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Texture;
use App\Models\Category;
use App\Models\Color;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
        $colors = Color::all();
        return view('admin.products.create', compact('categories', 'brands', 'textures', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     *
     */
    public function store(StoreProductRequest $request)
    {

        $data = $request->validated();
        $slug = Str::slug($request->name, '-');
        $data['slug'] = $slug;
        if ($request->has('cover_image')) {
            $image_path = Storage::put('images', $request->cover_image);
            $data['cover_image'] = $image_path;
        }
        $product = Product::create($data);

        if ($request->has('colors')) {
            $product->colors()->attach($request->colors);
        }
        return redirect()->route('admin.products.show', $product->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $textures = Texture::all();
        $colors = Color::all();
        $data = [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
            'textures' => $textures,
            'colors' => $colors
        ];
        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     *
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $slug = Str::slug($request->name, '-');
        $data['slug'] = $slug;
        if ($request->has('cover_image')) {
            if ($product->cover_image) {
                Storage::delete($product->cover_image);
            }
            $image_path = Storage::put('images', $request->cover_image);
            $data['cover_image'] = $image_path;
        }
        $product->update($data);
        if ($request->has('colors')) {
            $product->colors()->sync($request->colors);
        } else {
            $product->colors()->sync([]);
        }
        return redirect()->route('admin.products.show', $product->slug);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            // $datogliere = "http://127.0.0.1:8000/storage/";
            // $imagetoremove = str_replace($datogliere, '', $product->image);
            //dd($imagetoremove);
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', "$product->name deleted successfully.");
    }
}