<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $products = Product::latest()->take(8)->get(); // latest products

        return view('home', compact('categories', 'products'));
    }
}
