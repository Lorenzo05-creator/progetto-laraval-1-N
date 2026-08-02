<x-layout title="Nuovo Tag">
    <h1 class="mb-4">Crea Tag</h1>

    <form method="POST" action="{{ route('tags.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome Tag</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button class="btn btn-success">Salva</button>
    </form>
</x-layout>
