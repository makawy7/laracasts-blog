<x-layout2>
    <x-slot name="content">
        <article>
            <h1>{{ $post->title }}</h1>
            {!! $post->body !!}
        </article>
        <a href="/">Go back</a>
    </x-slot>
</x-layout2>
