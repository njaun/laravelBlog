<x-layout>
<x-slot:title>{{ $post->content  }}</x-slot:title>
<h1>{{ $post->content }}</h1>
<p>{{ $post->category->category_name ?? 'Nav kategorijas' }}</p>
<p>{{ $post->created_at }}</p>
<a href="{{ $post->id }}/edit">Rediģēt ierakstu</a>
<form method="POST" action="{{ $post->id }}">
    @csrf
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
        <h3>{{ $comment->author }}</h2>
        @if($comment_id == $comment->id)
            <form method="POST" action="/comments/{{ $comment->id }}">
                @csrf
                @method('PUT')
                <label>
                    <input name="content_edit" value="{{ $comment->content }}">   
                </label>
                @error("content_edit")
                <p>{{ $message }}</p>
                @enderror
        @else
            <h3>{{ $comment->content }}</h2>
        @endif

        <h3>{{ $comment->created_at }}</h2>

        @if($comment_id == $comment->id)
                <button>Saglabāt</button>
            </form>
        @else

        <a href="/comments/{{ $comment->id }}/edit">Rediģēt komentāru</a>
        @endif
        </form>
</div>
@endforeach
</x-layout>