@extends('layouts.admin')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white text-center">
          <h5>Gestion des Tags</h5>
        </div>

        <div class="card-body">
        <div class="d-flex justify-content-between mx-3 mt-3">
             <h3 class="card-title my-0">Liste des Catégories</h3>
            <a href="{{route('tags.create')}}" class="btn btn-success">Ajouter un tag</a>  
         </div>
         <div class="card-body">
                @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
                 @endif
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tags as $tag)
                <tr>
                  <td>{{ $tag->id }}</td>
                  <td>{{ $tag->name }}</td>
                  <td>
                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center mt-3">
          {{ $tags->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
