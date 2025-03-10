@extends('components.layout')

@section('title', 'Show Post')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Post Info</h2>
        <div class="border-b pb-4 mb-4">
            <p class="text-lg font-semibold">Title :- <span class="font-normal">{{$post['title']}}</span></p>
            <p class="text-lg font-semibold">Description :- <span class="font-normal">{{$post['Description']}}</span></p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Post Creator Info</h2>
        <p class="text-lg font-semibold">Name :- <span class="font-normal">{{$post['posted_by']['name']}}</span></p>
        <p class="text-lg font-semibold">Email :- <span class="font-normal">{{$post['posted_by']['email']}}</span></p>
        <p class="text-lg font-semibold">Created At :- <span class="font-normal">{{$post['posted_by']['created_at']}}</span></p>
    </div>
    
    <div class="max-w-3xl mx-auto shadow rounded-lg mt-6">
        <a href="/posts" class="bg-gray-700 text-white px-4 py-2 rounded-lg">Back to All Posts</a>
    </div>
@endsection
