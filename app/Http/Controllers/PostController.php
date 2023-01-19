<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {   

        $posts = Post::all();

        return Inertia('Dashboard', compact('posts'));
    }

    public function create() 
    {
        return Inertia('Create');
    }

    public function store(StorePostRequest $request) 
    {
        Post::create($request->validated());

        return redirect()->route('dashboard')->with('message','Post criado com sucesso!');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return inertia('Edit', compact('post'));
    }

    public function update($id, StorePostRequest $request)
    {
        $post = Post::findOrFail($id);

        $post ->update($request->validated());

        return redirect()->route('dashboard')->with('message', 'Post editado com sucesso!');
    }

    public function destroy($id)
    {   
        $post = Post::find($id);
        $post->delete();  

        return redirect()->route('dashboard')->with('message', 'Post apagado com sucesso!');
    }
}
