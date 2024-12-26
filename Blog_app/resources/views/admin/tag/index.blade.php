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
