<x-layout>
    <section class="py-8 max-w-lg mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish A New Post
        </h1>
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
            <form action="/admin/posts/create" method="POST" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" />
                <x-form.input name="thumbnail" type="file" />
                <x-form.input name="excerpt" />
                <x-form.input name="body" />
                <x-form.select name="category_id" />
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Post</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
