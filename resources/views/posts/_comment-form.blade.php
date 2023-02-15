<form action="/posts/{{ $post->slug }}/comment" method="POST" class="border border-gray-200 p-6 rounded-xl">
    @csrf
    <header class="flex items-center">
        <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="" class="rounded-full">

        <h2 class="ml-3">Want to participate?</h2>
    </header>
    <div class="mt-5">
        <textarea name="body" class="w-full text-sm" rows="5" placeholder="Think of something to say!" required></textarea>
        @error('body')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
        <button type="submit"
            class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
    </div>
</form>
