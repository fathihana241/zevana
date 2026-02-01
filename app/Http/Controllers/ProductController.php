<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // 1️ Create new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id', // child category
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    // 2️ Update existing product (Postman-friendly)
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric',
            'stock' => 'sometimes|integer',
            'category_id' => 'sometimes|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->has('name')) $product->name = $request->name;
        if ($request->has('price')) $product->price = $request->price;
        if ($request->has('stock')) $product->stock = $request->stock;
        if ($request->has('category_id')) $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = 'uploads/products/' . $imageName;
        }

        $product->save();

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ]);
    }

    // 3 Watches page
    public function watches()
    {
        $products = Product::where('category_id', 1)->get(); // Watches
        $category = 'watches';
        return view('watches', compact('products', 'category'));
    }

    // 4️ Eyewear page
    public function eyewear()
    {
        $products = Product::where('category_id', 6)->get(); // Eyewear
        $category = 'eyewear';
        return view('eyewear', compact('products', 'category'));
    }

   public function jewelry(Request $request)
{
    $childCategory = $request->query('category'); // e.g., necklace

    $query = Product::whereHas('category', function ($q) {
        $q->where('parent_id', 3); // parent = Jewelry
    });

    if ($childCategory) {
        // map category name to child_id
        $categoryMap = [
            'necklace' => 10,
            'earrings' => 12,
            'bracelet' => 13,
            'rings' => 11,
        ];

        if (isset($categoryMap[$childCategory])) {
            $query->where('category_id', $categoryMap[$childCategory]);
        }
    }

    $products = $query->get();
    $category = 'jewelry';

    return view('jewelry', compact('products', 'category'));
}
public function accessories()
{
    // Child categories under Accessories (parent_id = 2)
    $categories = [
        'bag'  => 7,
        'pen'  => 8,
        'belt' => 9,
    ];

    $productsByCategory = [];

    foreach ($categories as $key => $categoryId) {
        $productsByCategory[$key] = Product::where('category_id', $categoryId)->get();
    }

    return view('accessories', compact('productsByCategory'));
}

public function fragrance()
{
    // Fragrance category ID = 5
    $products = Product::where('category_id', 5)->get();

    $category = 'fragrance';

    return view('fragrance', compact('products', 'category'));
}
 public function skincare()
{
    // Child categories under Skincare (parent_id = 4)
    $categories = [
        'naturaloil'      => 14,
        'moisturizer'  => 15,
        'makeup'       => 16,
        'tools'        => 17,
        'lipcare'      => 18,
    ];

    $productsByCategory = [];

    foreach ($categories as $key => $categoryId) {
        $productsByCategory[$key] = Product::where('category_id', $categoryId)->get();
    }

    return view('skincare', compact('productsByCategory'));
}

}
