@extends('layouts.admin')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white text-center">
          <h5>Ajouter un Article</h5>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('articles.store') }}">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Titre</label>
              <input
                type="text"
                name="title"
                class="form-control"
                id="title"
                placeholder="Titre de l'article"
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
                required>
            </div>
            <div class="mb-3">
              <label for="tags" class="form-label">Tags</label>
              <input
                type="text"
                id="tag-input"
                class="form-control border-success shadow-sm"
                placeholder="Ajoutez des tags et appuyez sur Entrée">
              <div id="tags-container" class="mt-2 d-flex flex-wrap gap-2"></div>
              <input type="hidden" name="tags" id="hidden-tags">
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Contenu</label>
              <textarea
                name="content"
                class="form-control"
                id="content"
                rows="5"
                placeholder="Contenu de l'article"
                required></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-success px-4">Ajouter</button>
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

let tagsArray = [];

// Add a tag when pressing Enter
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

// Add tag to the UI
function addTag(tagText) {
  const badge = document.createElement('span');
  badge.className = 'badge bg-success d-flex align-items-center me-2 mb-1';
  badge.innerHTML = `
      ${tagText}
      <button type="button" class="btn-close btn-close-white ms-2" aria-label="Remove" onclick="removeTag('${tagText}', this)"></button>
  `;
  tagsContainer.appendChild(badge);
}

// Remove tag from the UI and array
function removeTag(tagText, button) {
    tagsArray = tagsArray.filter(tag => tag !== tagText);
    button.parentElement.remove();
    updateHiddenTags();
}

// Update the hidden input with current tags
function updateHiddenTags() {
    hiddenTagsInput.value = tagsArray.join(',');
}
</script>
@endsection
