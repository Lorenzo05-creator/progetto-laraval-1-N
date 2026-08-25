<x-layout title="Modifica Articolo">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow-lg">

<div class="card-body p-5">

<h1 class="fw-bold mb-4">

 Modifica Articolo

</h1>

<form
action="{{ route('articles.update',$article) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-4">

<label class="form-label">

Titolo

</label>

<input
type="text"
name="title"
class="form-control"
value="{{ old('title',$article->title) }}"
required>

</div>

<div class="mb-4">

<label class="form-label">

Categoria

</label>

<select
name="category_id"
class="form-select"
required>

@foreach($categories as $category)

<option
value="{{ $category->id }}"
@selected(old('category_id',$article->category_id)==$category->id)>

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-5">

<label class="form-label">

Contenuto

</label>

<textarea
name="content"
rows="10"
class="form-control"
required>{{ old('content',$article->content) }}</textarea>

</div>

<div class="d-flex justify-content-between">

<a
href="{{ route('articles.show',$article) }}"
class="btn btn-outline-light">

Annulla

</a>

<button
class="btn btn-success">

 Salva Modifiche

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</x-layout>