<x-layout :title="$article->title">
    <div class="card shadow">
        <div class="card-body">

            <h1>{{ $article->title }}</h1>

            <p class="mt-3">{{ $article->content }}</p>

            <div class="mt-3">
                @foreach ($article->tags as $tag)
                    <a href="{{ route('tags.show', $tag) }}"
                       class="badge bg-info text-dark">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>

            <div class="mt-4 d-flex gap-2">
                <a href="{{ route('articles.index') }}"
                   class="btn btn-secondary">
                    Torna indietro
                </a>

                <!-- Bottone ELIMINA -->
                <form action="{{ route('articles.destroy', $article) }}"
                      method="POST"
                      onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?');">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Elimina articolo
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-layout>

