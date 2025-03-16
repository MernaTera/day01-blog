@extends('components.layout')

@section('title', 'ITI Blog Post')

@section('content')
@php
    \Debugbar::disable();
@endphp

    <div class="text-center">
        <a href="{{ route('posts.create') }}" class="mt-4 px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none">Create Post</a>
    </div>

    <!-- Table Component -->
    <div class="mt-6 rounded-lg border border-gray-200">
        <div class="overflow-x-auto rounded-t-lg">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="text-left">
                    <tr>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">#</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Title</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Slug</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Posted By</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Created At</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                  @foreach($posts as $post)
                    <tr>
                        <td class="px-4 py-2 text-gray-900">{{$post->id}}</td>
                        <td class="px-4 py-2 text-gray-700">{{$post->title}}</td>
                        <td class="px-4 py-2 text-gray-700">{{$post->slug}}</td>
                        <td class="px-4 py-2 text-gray-700">{{$post->user->name}}</td>
                        <td class="px-4 py-2 text-gray-700">{{$post->created_at}}</td>
                        <td class="px-4 py-2 space-x-2">
                            <div class="flex items-center gap-2 mt-6">
                                <a href="{{route('posts.show',$post['id'])}}" class="inline-block px-4 py-1 text-xs font-medium text-white bg-blue-400 rounded">View</a>
                                <a href="{{route('posts.edit',$post['id'])}}" class="inline-block px-4 py-1 text-xs font-medium text-white bg-blue-600 rounded">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block px-4 py-1 text-xs font-medium text-white bg-red-600 rounded">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if($deletedPosts->count() > 0)
    <div class="mt-6 bg-red-100 border border-red-400 text-red-900 rounded-lg p-4 shadow-md">
        <h3 class="text-lg font-semibold mb-3 flex items-center">
            <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-7 7-7-7"></path>
            </svg>
            Deleted Posts
        </h3>
        <ul class="space-y-3">
            @foreach($deletedPosts as $post)
                <li class="flex justify-between items-center bg-white p-4 rounded-lg shadow-md border border-gray-200">
                    <span class="font-medium text-gray-800">{{ $post->title }}</span>
                    <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-black font-semibold rounded-lg hover:bg-yellow-600 transition duration-200 shadow">
                            Restore
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endif


    <!-- Pagination -->
    <div class="mt-4 flex justify-center space-x-2">
        {{ $posts->links() }}
    </div>


    <script>
        function confirmDelete(event) {
            event.preventDefault(); 

            let confirmAction = confirm("Are you sure you want to delete this post?");
            if (confirmAction) {
                event.target.submit();
            }
        }
    </script>
@endsection
