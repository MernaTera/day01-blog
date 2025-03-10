@extends('components.layout')

@section('title', 'ITI Blog Post')

@section('content')
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
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Posted By</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Created At</th>
                        <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                  @foreach($posts as $post)
                    <tr>
                        <td class="px-4 py-2 text-gray-900">{{$post['id']}}</td>
                        <td class="px-4 py-2 text-gray-700">{{$post['title']}}</td>
                        <td class="px-4 py-2 text-gray-700">{{$post['posted_by']}}</td>
                        <td class="px-4 py-2 text-gray-700">{{$post['created_at']}}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{route('posts.show',$post['id'])}}" class="inline-block px-4 py-1 text-xs font-medium text-white bg-blue-400 rounded">View</a>
                            <a href="{{route('posts.edit',$post['id'])}}" class="inline-block px-4 py-1 text-xs font-medium text-white bg-blue-600 rounded">Edit</a>
                            <a href="#" class="inline-block px-4 py-1 text-xs font-medium text-white bg-red-600 rounded">Delete</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex justify-center space-x-2">
        <button class="px-3 py-1 border rounded">&lt;</button>
        <button class="px-3 py-1 border rounded">1</button>
        <button class="px-3 py-1 border rounded bg-blue-500 text-white">2</button>
        <button class="px-3 py-1 border rounded">3</button>
        <button class="px-3 py-1 border rounded">4</button>
        <button class="px-3 py-1 border rounded">&gt;</button>
    </div>
@endsection
