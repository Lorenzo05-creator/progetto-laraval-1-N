<x-layout title="Articoli">
    <h1 class="mb-4">Tutti gli Articoli</h1>

    <div class="row">
        @foreach($articles as $article)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">

                        <h5>{{ $article->title }}</h5>

                        <p class="text-muted">
                            {{ Str::limit($article->content, 100) }}
                        </p>

                        <div class="mb-2">
                            @foreach($article->tags as $tag)
                                <span class="badge bg-secondary">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>

                        <div class="d-flex gap-1">
                            <a href="{{ route('articles.show', $article) }}"
                               class="btn btn-primary btn-sm">
                                Leggi
                            </a>

                            <a href="{{ route('articles.edit', $article) }}"
                               class="btn btn-warning btn-sm">
                                Modifica
                            </a>

                            <!-- Bottone ELIMINA -->
                            <form action="{{ route('articles.destroy', $article) }}"
                                  method="POST"
                                  onsubmit="return confirm('Sei sicuro di voler eliminare questo articolo?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Elimina
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>

