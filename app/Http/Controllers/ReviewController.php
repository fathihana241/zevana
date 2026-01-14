<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return ReviewResource::collection(
            Review::with('user')->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);

        $review = Review::create([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'product_id' => $request->product_id,
            'user_id' => auth()->id(),
        ]);

        return new ReviewResource($review->load('user'));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json(['message' => 'Review deleted successfully']);
    }
}
