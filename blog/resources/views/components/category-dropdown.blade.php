<div>
    <x-dropdown>
        <x-slot name="trigger">
            <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 flex lg:inline-flex">
                {{-- Check if category is selected, otherwise display text 'Category'--}}
                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

                <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
            </button>
        </x-slot>

        <x-dropdown-item
{{--            href="/"--}}
            href="/?{{ http_build_query(request()->except('category', 'page')) }}"
            :active="request()->routeIs('home') && !request('category')">
            All
        </x-dropdown-item>

        @foreach($categories as $category)
            {{-- 2nd condition is shorthand for $currentCategory->id === $category->id --}}
            {{--                    {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-300 text-white text-white' : '' }}--}}
            <x-dropdown-item
                href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category','page')) }}"
                {{--                        :active="isset($currentCategory) && $currentCategory->is($category)"--}}
{{--                :active='request()->is("categories/{$category->slug}")'--}}
                :active='$category->is($currentCategory)'
            >
                {{ ucwords($category->name) }}
            </x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>
