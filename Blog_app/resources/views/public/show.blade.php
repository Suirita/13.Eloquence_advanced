@extends('layouts.public')
@section('content')
<div class="container mx-auto my-10 px-4">
    <!-- Header -->
    <div class="text-center">
        <h1 class="text-5xl font-extrabold text-gray-900">Article Details</h1>
        <p class="text-lg text-gray-600 mt-2">Explore the details of the selected article.</p>
    </div>

    <!-- Article Card -->
    <div class="bg-white shadow-xl rounded-xl p-8 mt-8 border border-gray-200">
        <!-- Article Title -->
        <h2 class="text-3xl font-semibold text-gray-800">{{ $article->title }}</h2>

        <!-- Author and Date -->
        <div class="mt-4 text-sm text-gray-500">
            <p>By <span class="font-semibold text-gray-700">{{ $article->author }}</span></p>
            <p>Published on <span class="font-medium text-gray-600">{{ $article->created_at->format('F j, Y') }}</span></p>
        </div>

        <!-- Article Content -->
        <div class="mt-6 text-gray-700 leading-relaxed space-y-4">
            {{ $article->content }}
        </div>

        <!-- Buttons -->
        <div class="mt-8 flex justify-between space-x-6">
            <form action="/articles" method="GET" class="inline">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                    Back to Articles
                </button>
            </form>
        </div>
    </div>
</div>

@endsection