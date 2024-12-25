
<!-- dashboard.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>Gestion des Articles</h1>

    <div class="card">
        <div class="card-header">
            <div class="card-tools m-2">
                <a href="{{route('articles.create')}}" class="btn btn-success">Ajouter un Article</a>
            </div>
                    
            <!-- input search -->
            <form method="GET" action="{{ route('articles.index') }}" class="d-flex mb-3">
                <div class="form-group mr-2 ">
                    <input type="text" name="search" id="search" class="form-control " value="{{ request('search') }}" placeholder="Rechercher un article">
                </div>
                <div class="form-group mr-2 ">
                <button type="submit" class="btn btn-primary">Recherche</button>
                </div>
            </form>

            <!-- select category and tag -->
            <form method="GET" action="{{ route('articles.index') }}" class="d-flex mb-3">
                <div class="form-group mr-2">
                    <select name="category" id="category" class="form-control">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-2">
                    <select name="tag" id="tag" class="form-control">
                        <option value="">Tous les tags</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filtrer</button>
            </form>

        </div>
        <!-- /.card-header -->
        <h3 class="card-title">Liste des Articles</h3>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Date de Création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>{{ $article->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-secondary">Afficher</a>
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Modifier</a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $articles->links() }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
