@props(['post'])
<div class="border border-black border-opacity-5 rounded-xl p-5">
    @auth
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/100?u={{ auth()->user()->id }}" alt="" class="w-20 h-20 rounded-full">
            <h1 class="font-bold ml-5">Want to participate?</h1>
        </header>
        <form action="/posts/{{ $post->slug }}/comments" method="POST" class="text-right">
            @csrf

            <textarea name="body" rows="5"
                class="w-full border border-black border-opacity-5 p-2 mt-2 text-sm focus:outline-none"
                placeholder="Quick, thing of something to say!" required></textarea>
            <x-button.submit>Post</x-button.submit>
        </form>
    @else
        <p class="text-sm">
            Please
            <a href="/register" class="hover:underline text-blue-500"> Register </a>
            or
            <a href="/login" class="hover:underline text-blue-500"> Login </a> to leave a comment.
        </p>
    @endauth
</div>
