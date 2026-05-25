<x-layout>
<x-slot:title>{{ $category->category_name  }}</x-slot:title>
<h1>{{ $category->category_name }}</h1>
<a href="{{ $category->id }}/edit">Rediģēt kategoriju</a>
<form method="POST" action="{{ $category->id }}">
    @csrf
    @method('delete')
    <button>Dzēst</button>
</form>
</x-layout>