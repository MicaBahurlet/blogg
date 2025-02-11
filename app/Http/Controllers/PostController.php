<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    // public function create()
    // {
    //     if (!auth()->check()) {
    //         return redirect()->route('login')->with('message', 'Por favor, inicia sesión para crear un post.');
    //     }

    //     return view('posts.create');
    // }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image_url = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post creado exitosamente');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $post = Post::findOrFail($id);
        // return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($post->image_url) {
                Storage::delete('public/' . $post->image_url);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image_url = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post actualizado exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        if ($post) {
            // primero veo si tiene img
            if ($post->image_url) {
                // después borro
                Storage::delete('public/images/' . $post->image_url);
            }

            $post->delete();
        }

        // Añadir mensaje de éxito a la sesión
        return redirect()->route('posts.index')->with('success', 'Post eliminado exitosamente');
    }
}
