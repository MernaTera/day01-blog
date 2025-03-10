@extends('components.layout')

@section('title', 'Create Post')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Create a New Post</h2>
        <form action="/posts" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" name="title" placeholder="Enter title">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea class="w-full p-2 border border-gray-300 rounded-lg" name="description" placeholder="Enter description"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Post Creator</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded-lg" name="creator_name" placeholder="Post Creator's Name">
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Create</button>
        </form>
    </div>
@endsection