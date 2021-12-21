<header class="mx-auto mt-20 text-center mb-20">
    <h1 class="text-4xl mb-5">
        <span class="text-blue-500">Blogify</span> <span>Latest Laravel News</span>
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-category-dropdown />
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                @if (request('categories'))
                    <input type="hidden" name="categories" value="{{ request('categories') }}" />
                @endif
                <input type="text" name="search" placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>
