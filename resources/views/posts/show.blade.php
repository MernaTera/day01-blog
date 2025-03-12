
@extends('components.layout')

@section('title', 'Show Post')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Post Info</h2>
        <div class="border-b pb-4 mb-4">
            <p class="text-lg font-semibold">Title :- <span class="font-normal">{{ $post->title }}</span></p>
            <p class="text-lg font-semibold">Description :- <span class="font-normal">{{ $post->description }}</span></p>
            @if ($post->image)
            <img src="{{ Storage::url($post->image) }}" alt="Post Image">
            @endif
        </div>
    </div>

    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Post Creator Info</h2>
        <p class="text-lg font-semibold">Name :- <span class="font-normal">{{ $post->user->name }}</span></p>
        <p class="text-lg font-semibold">Email :- <span class="font-normal">{{ $post->user->email }}</span></p>
        <p class="text-lg font-semibold">Created At :- <span class="font-normal">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y, h:i A') }}</span></p>
    </div>
    
    <div class="max-w-3xl mx-auto shadow rounded-lg mt-6">
        <a href="/posts" class="bg-gray-700 text-white px-4 py-2 rounded-lg">Back to All Posts</a>
    </div>

    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Comments</h2>

        <!-- Show Comments -->
        @foreach($post->comments as $comment)
            <div class="mb-4 border p-4 rounded-md">
                <p class="text-gray-800"><strong>{{ $comment->user->name ?? 'Anonymous' }}</strong>:</p>
                <p class="text-gray-600">{{ $comment->body }}</p>
                <p class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                
                <!-- Delete Comment -->
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </div>
        @endforeach

        <!-- Add Comment Form -->
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="body" rows="3" class="w-full border p-2 rounded-lg" placeholder="Add a comment..." required></textarea>
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg">Submit</button>
        </form>
    </div>
@endsection