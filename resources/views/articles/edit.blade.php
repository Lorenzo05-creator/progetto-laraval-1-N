<x-layout title="Modifica Articolo">
    <h1 class="mb-4">Modifica Articolo</h1>

    <form method="POST" action="{{ route('articles.update', $article) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" name="title"
                   value="{{ $article->title }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Contenuto</label>
            <textarea name="content" rows="5"
                      class="form-control">{{ $article->content }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tag</label>
            <select name="tags[]" class="form-select" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                        @selected($article->tags->contains($tag->id))>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-warning">Aggiorna</button>
    </form>
</x-layout>
