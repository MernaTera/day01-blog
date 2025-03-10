
@extends('components.layout')

@section('title', 'Edit Post')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Edit Post</h2>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700">Title</label>
                <input type="text" class="w-full border rounded p-2 mb-4" name="title" value="{{$post->title}}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea class="w-full border rounded p-2 mb-4" name="description">{{$post->description}}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Post Creator</label>
                <select class="w-full p-2 border border-gray-300 rounded-lg" name="creator_id">
                    @foreach($users as $user)
                        <option value="{{$user->id}}" {{ $user->id == $post->user_id ? 'selected' : '' }}>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update</button>
        </form>
    </div>
@endsection