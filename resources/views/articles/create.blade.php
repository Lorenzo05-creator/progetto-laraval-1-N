<x-layout title="Nuovo Articolo">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow-lg">

<div class="card-body p-5">

<h1 class="fw-bold mb-2">

 Nuovo Articolo

</h1>



<form action="{{ route('articles.store') }}"
method="POST">

@csrf

<div class="mb-4">

<label class="form-label fw-semibold">

Titolo

</label>

<input
type="text"
name="title"
class="form-control"
placeholder="Inserisci il titolo..."
value="{{ old('title') }}"
required>

</div>

<div class="mb-4">

<label class="form-label fw-semibold">

Categoria

</label>

<select
name="category_id"
class="form-select"
required>

<option value="">

Seleziona una categoria

</option>

@foreach($categories as $category)

<option
value="{{ $category->id }}"
@selected(old('category_id')==$category->id)>

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-5">

<label class="form-label fw-semibold">

Contenuto

</label>

<textarea
name="content"
rows="10"
class="form-control"
placeholder="Scrivi qui il tuo articolo..."
required>{{ old('content') }}</textarea>

</div>

<div class="d-flex justify-content-between">

<a
href="{{ route('articles.index') }}"
class="btn btn-outline-light px-4">

← Torna Indietro

</a>

<button
class="btn btn-success px-5">

 Pubblica

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</x-layout>