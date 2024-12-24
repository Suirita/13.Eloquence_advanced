@extends('layouts.admin')
@section('content')
<div class="container my-10">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="display-4 font-weight-bold text-dark">Article Details</h1>
        <p class="lead text-muted">Explore the details of the selected article.</p>
    </div>

    <!-- Article Card -->
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <!-- Article Title -->
            <h2 class="h3 font-weight-semibold text-dark">{{ $article->title }}</h2>

            <!-- Author and Date -->
            <div class="mt-4 text-muted">
                <p>By <span class="font-weight-bold text-dark">{{ $article->author }}</span></p>
                <p>Published on <span class="font-weight-medium text-muted">{{ $article->created_at->format('F j, Y') }}</span></p>
            </div>

            <!-- Article Content -->
            <div class="mt-6 text-dark">
                {{ $article->content }}
            </div>

            <div class="mt-8 d-flex justify-content-between">
                <!-- Back to Articles Button -->
                <form action="/articles" method="GET" class="d-inline">
                    <button type="submit" class="btn btn-primary">
                        Back to Articles
                    </button>
                </form>

                <div>
                    <!-- Edit Article Button -->
                    <form action="/articles/{{ $article->id }}/edit" method="GET" class="d-inline">
                        <button type="submit" class="btn btn-primary">
                            Edit Article
                        </button>
                    </form>

                    <!-- Delete Article Button -->
                    <form action="/articles/{{ $article->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete Article
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
