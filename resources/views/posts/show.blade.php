<x-layout>
<x-slot:title>{{ $post->title }}</x-slot:title>
<h1>{{ $post->title }}</h1>
<div class="content">
    {!! $post->content !!}
</div>
<p>{{ $post->category->category_name ?? 'Nav kategorijas' }}</p>
<p class="meta">{{ $post->created_at->format('M d, Y') }}</p>
<br>
<a href="{{ $post->id }}/edit"><button>Rediģēt ierakstu</button></a>
<form method="POST" action="{{ $post->id }}">
    @csrf
    <br>
    @method('delete')
    <button>Dzēst</button>
</form>

<h1>Komentāri</h1>

<form method="POST" action="/comments">
    @csrf
    <input name="author">
    @error("author")
    <p>{{ $message }}</p>
    @enderror
    <input name="content">
    @error("content")
    <p>{{ $message }}</p>
    @enderror
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <button>Saglabāt</button>
</form>

@foreach ($comments as $comment)
    <div>
        <h3>{{ $comment->author }}</h3>
        <h3>{{ $comment->content }}</h3>
        <h3>{{ $comment->created_at }}</h3>

        <a href="/comments/{{ $comment->id }}/edit"><button>Rediģēt komentāru</button></a>

        <form method="POST" action="/comments/{{ $comment->id }}">
            @csrf
            @method('DELETE')
            <button type="submit">Dzēst komentāru</button>
        </form>
    </div>
@endforeach
</x-layout>