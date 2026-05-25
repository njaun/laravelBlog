<x-layout>
<x-slot:title>Izveidot ierakstu</x-slot:title>
<h1>Izveidot ierakstu</h1>
<form method="POST" action="/posts">
    @csrf
    <input name="title" placeholder="Virsraksts">
    <textarea name="content" placeholder="Saturs"></textarea>
    <select name="category_id" required>
        <option value="">Izvēlieties kategoriju</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>
    <button>Saglabāt</button>

</form>

</x-layout>