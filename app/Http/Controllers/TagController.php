<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Resources\TagResource;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name',
        ]);

        $tag = Tag::create([
            'name' => $request->name,
        ]);

        return new TagResource($tag);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(['message' => 'Tag deleted successfully']);
    }
}
