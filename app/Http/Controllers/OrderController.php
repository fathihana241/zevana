<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('cart', compact('orders'));
    }
     public function adminOrders()
    {
        $orders = Order::with('items', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders', compact('orders'));
    }

    // NEW: Delete Order (admin)
    public function destroyOrder(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully.');
    }

    
}
