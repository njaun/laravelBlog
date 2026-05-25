<x-layout>
<x-slot:title>{{ $post->title }}</x-slot:title>
<h1>{{ $post->title }}</h1>
<p class="meta">{{ $post->created_at->format('M d, Y') }}</p>
<div class="content">
    {!! $post->content !!}
</div>
<a href="{{ $post->id }}/edit">Rediģēt ierakstu</a>
<form method="POST" action="{{ $post->id }}">
    @csrf
    @method('delete')
    <button>Dzēst</button>
</form>
</x-layout>