<x-layout>
<h1>Visi ieraksti</h1>
<ul>
@foreach ($categories as $category)
<li><a href="categories/{{ $category->id }}">{{ $category->category_name }}</a></li>
@endforeach
</ul>
</x-layout>