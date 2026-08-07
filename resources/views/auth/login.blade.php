<x-layout title="Login">

<div class="row justify-content-center">

<div class="col-lg-5">

<div class="card shadow-lg p-4">

<h2 class="text-center fw-bold mb-4">

Bentornato 👋

</h2>

<p class="text-center text-secondary mb-4">

Accedi al tuo account

</p>

<form method="POST" action="{{ route('login') }}">

@csrf

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

<div class="mb-4">

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

<button class="btn btn-primary w-100 py-2">

Accedi

</button>

</form>

<hr class="my-4">

<p class="text-center mb-0">

Non hai un account?

<a href="{{ route('register') }}">

Registrati

</a>

</p>

</div>

</div>

</div>

</x-layout>