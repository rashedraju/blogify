@props(['link' => ""])

<a href="{{ $link }}" class="px-5 mx-2 py-2 my-5 text-white rounded-xl bg-blue-500 hover:bg-blue-600 ">
    {{ $slot }}
</a>
