<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->query());
        if (!empty($request->query('category_id'))) {
            $category_id = $request->query('category_id');
            $products = Product::where('category_id', $category_id)->with('brand', 'category')->paginate(10);
        } else {
            $products = Product::with('brand', 'category')->paginate(10);
        }
        $categories = Category::all();
        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        return response()->json([
            'status' => 'success',
            'message' => 'Ok',
            'results' => $data
        ], 200);
    }

    public function show($slug)
    {
        $product = Product::with('brand', 'category', 'colors', 'texture')->where('slug', $slug)->first();

        if ($product) {
            return response()->json([
                'status' => 'success',
                'message' => 'Ok',
                'results' => $product
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Error'
            ], 404);
        }
    }


}