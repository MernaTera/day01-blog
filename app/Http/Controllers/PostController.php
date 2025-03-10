<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Import the Post model

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'Laravel', 'posted_by' => 'Mark', 'created_at' => '2020-01-01'],
            ['id' => 2, 'title' => 'HTML', 'posted_by' => 'John', 'created_at' => '2020-01-02'],
            ['id' => 3, 'title' => 'Laravel', 'posted_by' => 'Doe', 'created_at' => '2020-01-03'],
            ['id' => 4, 'title' => 'HTML', 'posted_by' => 'Jane', 'created_at' => '2020-01-04'],
            ['id' => 5, 'title' => 'CSS', 'posted_by' => 'Dane', 'created_at' => '2020-01-05']
        ];
        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = [
            'id' => 1, 
            'title' => 'Laravel',
            'Description' => 'This is a Laravel post',
            'posted_by' => ['name' => 'Mark', 'email' => 'mark@gmail.com', 'created_at' => 'Thursday 25th of December 1975 02:15:16 PM'],
            'created_at' => '2020-01-01'
        ];
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->all();
        return to_route('posts.index');
    }

    public function edit($id)
    {
        $post = [
            'id' => 1, 
            'title' => 'Laravel',
            'Description' => 'This is a Laravel post',
            'posted_by' => ['name' => 'Mark', 'email' => 'mark@gmail.com', 'created_at' => 'Thursday 25th of December 1975 02:15:16 PM'],
            'created_at' => '2020-01-01'
        ];
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $data = request()->all();
        return to_route('posts.index');
    }
}