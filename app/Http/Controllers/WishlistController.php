<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // ADD TO WISHLIST
    public function store(Request $request)
    {
        Wishlist::firstOrCreate([
            'user_id'    => Auth::id(),
            'product_id' => $request->product_id,
        ], [
            'category'    => $request->category,
            'subcategory' => $request->subcategory,
        ]);

        return back()->with('success', 'Added to wishlist');
    }

    // SHOW WISHLIST PAGE
    public function index()
    {
        $wishlists = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('wishlist.index', compact('wishlists'));
    }

    // REMOVE FROM WISHLIST
    public function destroy($id)
    {
        Wishlist::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Removed from wishlist');
    }
}
