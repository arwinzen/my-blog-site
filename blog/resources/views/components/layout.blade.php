<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
{{--    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}
    <title>My Blog</title>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-yellow-50 bg-opacity-30" style="font-family: Inter, sans-serif">
    <section class="px-6 py-8">
        <nav class="flex justify-between items-center">
            <div>
                <a href="/">
                    <h1 class="font-bold tracking-wider">TheWriteStuff</h1>
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                {{-- @guest roughly translates to @if(!auth()->check()) --}}
{{--                @guest--}}
{{--                    <a href="/register" class="text-xs font-bold uppercase">Register</a>--}}
{{--                @endguest--}}

                @auth
                    {{-- dropdown goes here --}}
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}.</button>
                        </x-slot>

                        @admin
                            <x-dropdown-item href="/admin/posts" :active="request()->routeIs('admin.posts.index')">
                                All Posts
                            </x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/create" :active="request()->routeIs('admin.posts.create')" >
                                New Post
                            </x-dropdown-item>
                        @endadmin

                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()" >Log out</x-dropdown-item>

                        <form id="logout-form" method="POST" action="/logout" class="text-xs font-semibold text-blue-300 ml-6 mr-3.5 hidden">
                            @csrf
{{--                            <button type="submit" class="text-xs font-bold uppercase">Log Out</button>--}}
                        </form>
                    </x-dropdown>

                    {{--                    <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}.</span>--}}

                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
                @endauth

                <a href="#newsletter" class=" text-xs bg-blue-400 text-white py-2 px-4 ml-3 rounded-full font-semi-bold uppercase">
                    Subscribe
                </a>
            </div>

        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <h5 class="text-3xl">Keep up to date with the latest articles</h5>
            <p class="text-sm mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, veniam.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                        class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                        Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    <x-flash />

    @if (request()->routeIs('admin.posts.create') || request()->routeIs('admin.posts.edit'))
        <script src="{{ asset('js/app.js') }}"></script>
    @endif
</body>
</html>
