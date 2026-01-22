<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $productId = $request->query('product_id');
        $product = Product::findOrFail($productId);

        return view('checkout.index', compact('product'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:50',
            'address' => 'required|string',
            'product_id' => 'required|exists:products,id',
            
        ]);

        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);

        // Create Order
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $product->price + 50, // Add shipping fee
            'status' => 'confirmed',
        ]);

        // Create Order Item
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price,
            'image'     => $product->image,
        ]);

        return redirect()->route('checkout', ['product_id' => $product->id])
                         ->with('success', '✅ Your order has been confirmed!');
    }
}
