<x-layout>

    <div class="container">

        <h1 class="mb-4">
            Tag:
            <span class="badge bg-primary">{{ $tag->name }}</span>
        </h1>

        <h5 class="mb-3">Articoli collegati</h5>

        @forelse ($articles as $article)
            <div class="mb-3 p-3 border rounded">
                <h4>{{ $article->title }}</h4>

                <p>
                    {{ Str::limit($article->content, 120) }}
                </p>

                <a href="{{ route('articles.show', $article) }}"
                   class="btn btn-sm btn-outline-primary">
                    Vai all’articolo
                </a>
            </div>
        @empty
            <p>Nessun articolo associato a questo tag.</p>
        @endforelse

        <a href="{{ route('articles.index') }}"
           class="btn btn-secondary mt-4">
            Torna agli articoli
        </a>

    </div>

</x-layout>
