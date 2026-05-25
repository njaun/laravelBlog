<x-layout>
<x-slot:title>Rediģēt ierakstu</x-slot:title>
    <h1>{{ $post->title }}</h1>
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')
        <label>
            <input name="title" value="{{ old('title', $post->title) }}">
        </label>
        @error("title")
        <p>{{ $message }}</p>
        @enderror
        <textarea name="content">{{ old('content', $post->content) }}</textarea>
        @error("content")
        <p>{{ $message }}</p>
        @enderror
        <select name="category_id" required>
            <option value="">Izvēlieties kategoriju</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
            @endforeach
        </select>
        @error("category_id")
        <p>{{ $message }}</p>
        @enderror
        <button>Saglabāt</button>
    </form>
</x-layout>