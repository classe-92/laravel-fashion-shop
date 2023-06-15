<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->limit(5)->get();
        $categories = Category::all();
        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        return response()->json([
            'status' => true,
            'message' => 'Ok',
            'results' => $data
        ], 201);
    }
}