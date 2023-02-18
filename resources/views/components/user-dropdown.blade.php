<div class="relative lg:inline-flex bg-gray-100 rounded-xl">
    <x-dropdown>
        <x-slot name="trigger">
            <button class="text-xs font-bold uppercase">
                {{ $slot }}
            </button>
        </x-slot>
        @admin
            <x-dropdown-item href="/admin/posts" :active="request()->is('admin/dashboard')">Dashboard</x-dropdown-item>
            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
        @endadmin
        <x-dropdown-item x-data={} @click.prevent="document.querySelector('#logout-form').submit()" href="#">Logout
        </x-dropdown-item>
        <form id="logout-form" action="/logout" method="POST" class="hidden">
            @csrf
        </form>
    </x-dropdown>
</div>
