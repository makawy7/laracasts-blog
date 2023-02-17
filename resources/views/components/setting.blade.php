@props(['heading'])

<x-layout>
    <section class="py-8 max-w-5xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            {{ $heading }}
        </h1>
        <div class="flex">
            <aside class="w-48">
                <h4 class="font-semibold mb-4">Links</h4>
                <ul class="mb-1">
                    <a href="/admin/posts"
                        class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">Mange Posts</a>
                </ul>
                <ul class="mb-1">
                    <a href="/admin/posts/create"
                        class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                </ul>
            </aside>


            <main class="flex-1 max-w-3xl mx-auto mt-10 border border-gray-400 p-6 rounded-xl">
                {{ $slot }}
            </main>

        </div>
    </section>
</x-layout>
