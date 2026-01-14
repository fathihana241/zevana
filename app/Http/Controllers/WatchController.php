<?php

namespace App\Http\Controllers;

use App\Models\Product;

class WatchController extends Controller
{
    public function index()
    {
        $watches = Product::whereHas('category', function ($q) {
            $q->where('name', 'Watches');
        })->get();

        return view('watch.index', compact('watches'));
    }
}
