@extends('layouts.public')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach ($articles as $article)

    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$article->title}}</h5>
        </a>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">By {{$article->author}}</p>
        
        <!-- Categories -->
        <div class="flex flex-wrap mb-2">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                Front-end
            </span>
            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                JavaScript
            </span>

        </div>

        <!-- Tags -->
        <!-- <div class="flex flex-wrap gap-2 mb-3">
            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                JavaScript
            </span>
          
        </div> -->

        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$article->content}}</p>
        
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>

    @endforeach
</div>

@endsection
