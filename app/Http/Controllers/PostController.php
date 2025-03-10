<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(7);
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        $users = User::all();
        return view('posts.show', compact('post', 'users'));
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'creator_id' => 'required|exists:users,id'
        ]);

        $post = Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['creator_id']
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::all();
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'creator_id' => 'required|exists:users,id'
        ]);

        $post = Post::findOrFail($id);
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->user_id = $data['creator_id'];
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}