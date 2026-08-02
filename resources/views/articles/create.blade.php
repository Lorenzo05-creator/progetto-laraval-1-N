<x-layout title="Nuovo Articolo">
    <h1 class="mb-4">Crea Articolo</h1>

    <form method="POST" action="{{ route('articles.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Contenuto</label>
            <textarea name="content" rows="5" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tag</label>
            <select name="tags[]" class="form-select" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <small class="text-muted">CTRL per selezione multipla</small>
        </div>

        <button class="btn btn-success">Salva</button>
    </form>
</x-layout>
