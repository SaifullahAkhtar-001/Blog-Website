<x-dropdown>
    <x-slot:trigger>
        <button
            class="text-left py-2.5 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 flex lg:inline-flex"
        >
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}
            <x-icon name="drop_arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot:trigger>
    <x-dropdown-item
        href="/?{{ http_build_query(request()->except('category', 'page')) }}"
                      :active="request()->routeIs('home') && is_null(request()->getQueryString())">
        All
    </x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active='request()->fullUrlIs("*?category={$category->slug}*")'
        >
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
