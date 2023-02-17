<x-setting heading="Publish A New Post">
    <form action="/admin/posts/create" method="POST" enctype="multipart/form-data">
        @csrf
        <x-form.input name="title" />
        <x-form.input name="thumbnail" type="file" />
        <x-form.input name="excerpt" />
        <x-form.input name="body" />
        <x-form.select name="category_id" />
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Post</button>
        </div>
    </form>
</x-setting>
