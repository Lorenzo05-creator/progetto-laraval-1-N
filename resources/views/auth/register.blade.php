<x-layout title="Registrazione">

<div class="row justify-content-center">

<div class="col-lg-5">

<div class="card shadow-lg p-4">

<h2 class="text-center fw-bold mb-4">

Crea un Account 🚀

</h2>

<p class="text-center text-secondary mb-4">

Unisciti a MyBlog

</p>

<form method="POST" action="{{ route('register') }}">

@csrf

<div class="mb-3">

<label class="form-label">

Nome

</label>

<input
type="text"
name="name"
class="form-control"
value="{{ old('name') }}"
placeholder="Il tuo nome"
required>

</div>

<div class="mb-3">

<label class="form-label">

Email

</label>

<input
type="email"
name="email"
class="form-control"
value="{{ old('email') }}"
placeholder="nome@email.com"
required>

</div>

<div class="mb-3">

<label class="form-label">

Password

</label>

<input
type="password"
name="password"
class="form-control"
placeholder="********"
required>

</div>

<div class="mb-4">

<label class="form-label">

Conferma Password

</label>

<input
type="password"
name="password_confirmation"
class="form-control"
placeholder="********"
required>

</div>

<button class="btn btn-success w-100 py-2">

Registrati

</button>

</form>

<hr class="my-4">

<p class="text-center mb-0">

Hai già un account?

<a href="{{ route('login') }}">

Accedi

</a>

</p>

</div>

</div>

</div>

</x-layout>