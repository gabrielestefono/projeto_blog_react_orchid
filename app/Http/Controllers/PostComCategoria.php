<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostComCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['categoria'])->paginate(12);

        return response()->json([
            'last_page' => $posts->lastPage(),
            'current_page' => $posts->currentPage(),
            'data' => $posts->items(),
            'from' => $posts->firstItem(),
            'per_page' => $posts->perPage(),
            'to' => $posts->lastItem(),
            'total' => $posts->total(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::with(['categoria'])->find($id);
        return response()->json($posts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
