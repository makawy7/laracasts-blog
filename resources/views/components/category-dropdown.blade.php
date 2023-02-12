<div class="relative lg:inline-flex bg-gray-100 rounded-xl">
    <x-dropdown>
        <x-slot name="trigger">
            <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
                <x-down-arrow class="absolute pointer-events-none" />
            </button>
        </x-slot>

        <x-dropdown-item
            href="/{{ request('search') ? '&search=' . request('search') : '' }}{{ request('author') ? '&author=' . request('author') : '' }}"
            :active="!isset($currentCategory)">
            All
        </x-dropdown-item>
        {{-- :active="isset($currentCategory) && $currentCategory->is($category)" --}}
        {{-- request()->getQueryString() --}}
        {{-- http_build_query(request()->except('category', 'page')) --}}
        @foreach ($categories as $category)
            <x-dropdown-item
                href="/?category={{ $category->slug }}{{ request('search') ? '&search=' . request('search') : '' }}{{ request('author') ? '&author=' . request('author') : '' }}"
                :active="isset($currentCategory) && $currentCategory->is($category)">
                {{ ucwords($category->name) }}
            </x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>
