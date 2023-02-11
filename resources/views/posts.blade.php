<x-layout>
    @foreach ($posts as $post)
        {{-- @dd($loop) --}}
        <article>
            <h1><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h1>
            <p>{{ $post->excerpt }}</p>

            <h3>author: <a href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a> </h3>
            <h3>category: <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a> </h3>
        </article>
    @endforeach
</x-layout>
