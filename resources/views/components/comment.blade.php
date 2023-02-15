@props(['comment'])

<article class="flex bg-gray-50 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->user->name }}</h3>
            <p class="text-sm">Posted <time>{{ $comment->created_at->diffForHumans() }}</time></p>
        </header>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
