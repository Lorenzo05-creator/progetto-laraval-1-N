<x-layout :title="$article->title">

<div class="row justify-content-center">

<div class="col-lg-9">

<div class="card shadow-lg">

<div class="card-body p-5">

<span class="badge bg-primary mb-4">

{{ $article->category?->name }}

</span>

<h1 class="display-4 fw-bold mb-4">

{{ $article->title }}

</h1>

<div class="d-flex flex-wrap gap-4 mb-5 text-secondary">

<span>

 {{ $article->user->name }}

</span>

<span>

 {{ $article->created_at->format('d/m/Y H:i') }}

</span>

</div>

<hr class="mb-5">

<div class="fs-5 lh-lg">

{!! nl2br(e($article->content)) !!}

</div>

<hr class="my-5">

<div class="d-flex justify-content-between flex-wrap gap-3">

<a
href="{{ route('articles.index') }}"
class="btn btn-outline-light">

← Tutti gli articoli

</a>

@auth

@if(auth()->id()==$article->user_id)

<div class="d-flex gap-2">

<a
href="{{ route('articles.edit',$article) }}"
class="btn btn-warning">

 Modifica

</a>

<form
action="{{ route('articles.destroy',$article) }}"
method="POST">

@csrf
@method('DELETE')

<button
class="btn btn-danger"
onclick="return confirm('Vuoi eliminare questo articolo?')">

🗑 Elimina

</button>

</form>

</div>

@endif

@endauth

</div>

</div>

</div>

</div>

</div>

</x-layout>