<!doctype html>

<head>
    <title>Laravel From Scratch Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/" class="text-4xl mb-5 text-blue-500 font-semibold">
                Laracasts-blog
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth
                <div class="relative lg:inline-flex">
                    <x-dropdown title="Welcome, {{ auth()->user()->name}}">

                        @admin
                            <x-dropdown.item
                                title="Dashboard" link="/admin/posts"
                                active="{{request()->is('admin/posts')}}"/>

                            <x-dropdown.item
                                title="Create new post" link="/admin/posts/create"
                                active="{{request()->is('admin/posts/create')}}"/>
                        @endadmin

                        <x-dropdown.item
                            title="Profile"
                            link="/{{ auth()->user()->username }}/profile"
                            x-data="{}"
                        />

                        <x-dropdown.item
                            title="Logout"
                            link="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout').submit()"
                        />

                        <form id="logout" action="/logout" method="POST" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                </div>

            @else
                <a href="/register" class="font-semibold mr-2">Register</a>
                |
                <a href="/login" class="text-xs font-bold uppercase ml-2">Login</a>
            @endauth
            <a href="#newsletter"
               class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    {{$slot}}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="./images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10" id="newsletter">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf

                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <div>
                            <input id="email" type="text" name="email" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>
                        @error('email')
                        <p class="text-xs text-red-500">{{$message}}</p>
                        @enderror
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
@if(session()->has('success'))
    <div
        x-data="{show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show">
        <p class="bg-blue-500 bottom-2 fixed p-1 px-3 right-2 rounded-md text-white">{{session('success')}}</p>
    </div>
@endif
</body>
