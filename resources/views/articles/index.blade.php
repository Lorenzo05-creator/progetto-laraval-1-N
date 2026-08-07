<x-layout title="MyBlog">

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h1 class="fw-bold">MyBlog</h1>

        <p class="text-muted mb-0">
            Gli ultimi articoli pubblicati.
        </p>

    </div>

    @auth

        <a href="{{ route('articles.create') }}" class="btn btn-primary">

            Nuovo articolo

        </a>

    @endauth

</div>

@if($articles->isEmpty())

<div class="card">

    <div class="card-body text-center">

        <h4>Nessun articolo presente</h4>

        <p class="text-muted mb-0">

            Pubblica il primo articolo.

        </p>

    </div>

</div>

@else

<div class="row">

@foreach($articles as $article)

<div class="col-md-6 col-lg-4 mb-4">

<div class="card h-100">

<div class="card-body d-flex flex-column">

@if($article->category)

<span class="badge bg-secondary mb-3 align-self-start">

{{ $article->category->name }}

</span>

@endif

<h4 class="fw-bold">

{{ $article->title }}

</h4>

<p class="text-muted flex-grow-1">

{{ Str::limit($article->content,120) }}

</p>

<div class="small text-muted mb-3">

Autore: {{ $article->user->name }}<br>

{{ $article->created_at->format('d/m/Y') }}

</div>

<div class="d-flex gap-2 flex-wrap">

<a href="{{ route('articles.show',$article) }}"
class="btn btn-primary btn-sm">

Leggi

</a>

@auth

@if(auth()->id() == $article->user_id)

<a href="{{ route('articles.edit',$article) }}"
class="btn btn-warning btn-sm">

Modifica

</a>

<form action="{{ route('articles.destroy',$article) }}"
method="POST">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Sei sicuro di voler eliminare questo articolo?')">

Elimina

</button>

</form>

@endif

@endauth

</div>

</div>

</div>

</div>

@endforeach

</div>

@endif

</x-layout>