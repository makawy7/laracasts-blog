<x-setting heading="Publish A New Post">
    <form action="/admin/posts/{{ $post->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-form.input name="title" value="{{ old('title', $post->title) }}" />
        <div class="flex mt-6">
            <div class="flex-1">
                <x-form.input name="thumbnail" type="file" />
            </div>
            <img class="rounded-xl ml-6" width="100"
                src="{{ $post->thumbnail ? asset('/storage/' . $post->thumbnail) : asset('/storage/thumbnails/no-image.png') }}">
        </div>
        <x-form.input name="excerpt" value="{!! old('excerpt', $post->excerpt) !!}" />
        <x-form.input name="body" value="{!! old('body', $post->body) !!}" />
        <x-form.select name="category_id" />
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Edit</button>
        </div>
    </form>
</x-setting>
