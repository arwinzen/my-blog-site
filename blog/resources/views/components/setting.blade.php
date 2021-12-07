@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">

    <h1 class="text-3xl font-bold mb-6 pb-4 border-b">
        <a>{{ $heading }}</a>
    </h1>

    <div class="lg:flex">
        <aside class="w-28 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="/admin/posts" class="{{ request()->routeIs('admin.posts.index') ? 'text-blue-500' : '' }}">All Posts</a>
                </li>

                <li>
                    <a href="/admin/posts/create" class="{{ request()->routeIs('admin.posts.create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>

</section>
