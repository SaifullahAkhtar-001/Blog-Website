<!doctype html>

<title>Saifullah's Blog</title>
<link rel="stylesheet" href="/style.css">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" type="image/x-icon" href="/images/letter-s.png">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<body>
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div class="flex items-end">
            <a href="/" class="logo">
                <span class="text-4xl text-purple-500">S</span>aifullah Akhtar
            </a>
        </div>
        <div class="mt-8 md:mt-0 flex items-center">
        @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
                    </x-slot>
                    @admin
                    <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Dashboard</x-dropdown-item>
                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
                    @endadmin
                    <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>
                </x-dropdown>
            @else
                <a href="/register" class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-purple-500' : '' }}">Register</a>
                <a href="/login" class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-purple-500' : '' }}">Log In</a>
            @endauth

            <a href="#newsletter" class="bg-purple-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>
    {{ $slot }}
    <footer id="newsletter" class="color2 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>
                        <input id="email" type="text" placeholder="Your email address" name="email" value="{{old('email')}}"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none text-neutral-700">
                        @error('email')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-purple-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>

<x-flash/>
</body>
