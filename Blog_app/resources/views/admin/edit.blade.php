@extends('layouts.app')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white text-center">
          <h5>Ajouter un Article</h5>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('articles.update', $article->id) }}" onsubmit="return validateTags()">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Titre</label>
              <input
                type="text"
                name="title"
                class="form-control"
                id="title"
                placeholder="Titre de l'article"
                value="{{ $article->title }}"
                required>
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Catégorie</label>
              <input
                type="text"
                name="category"
                class="form-control"
                id="category"
                placeholder="Catégorie de l'article"
                value="{{ $article->category }}"
                required>
            </div>
            <div class="mb-3">
              <label for="tags" class="form-label">Tags</label>
              <input
                type="text"
                id="tag-input"
                class="form-control border-primary shadow-sm"
                placeholder="Ajoutez des tags et appuyez sur Entrée">
              <div id="tags-container" class="mt-2 d-flex flex-wrap gap-2">
                @if(isset($tags) && !empty($tags))
                  @foreach(explode(',', $tags) as $tag)
                    <span class="badge bg-primary d-flex align-items-center me-2 mb-1">
                      {{ $tag }}
                      <button type="button" class="btn-close btn-close-white ms-2" aria-label="Remove" onclick="removeTag('{{ $tag }}', this)"></button>
                    </span>
                  @endforeach
                @endif
              </div>
              <input type="hidden" name="tags" id="hidden-tags" value="{{ $tags ?? '' }}">
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Contenu</label>
              <textarea
                name="content"
                class="form-control"
                id="content"
                rows="5"
                placeholder="Contenu de l'article"
                required>{{ $article->content }}</textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary px-4">Modifier</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
const tagInput = document.getElementById('tag-input');
const tagsContainer = document.getElementById('tags-container');
const hiddenTagsInput = document.getElementById('hidden-tags');

let tagsArray = hiddenTagsInput.value ? hiddenTagsInput.value.split(',') : [];

document.addEventListener('DOMContentLoaded', function () {
  if (!tagsContainer.hasChildNodes()) {
    tagsArray.forEach(tag => {
      if (tag.trim()) addTag(tag.trim());
    });
  }
});


tagInput.addEventListener('keypress', function (event) {
  if (event.key === 'Enter') {
    event.preventDefault();
    const tagText = tagInput.value.trim();
    if (tagText && !tagsArray.includes(tagText)) {
      addTag(tagText);
      tagsArray.push(tagText);
      updateHiddenTags();
      tagInput.value = '';
    }
  }
});

function addTag(tagText) {
  const badge = document.createElement('span');
  badge.className = 'badge bg-primary d-flex align-items-center me-2 mb-1';
  badge.innerHTML = `
      ${tagText}
      <button type="button" class="btn-close btn-close-white ms-2" aria-label="Remove" onclick="removeTag('${tagText}', this)"></button>
  `;
  tagsContainer.appendChild(badge);
}

function removeTag(tagText, button) {
  tagsArray = tagsArray.filter(tag => tag !== tagText);
  button.parentElement.remove();
  updateHiddenTags();
}

function updateHiddenTags() {
  hiddenTagsInput.value = tagsArray.join(',');
}
</script>
@endsection
