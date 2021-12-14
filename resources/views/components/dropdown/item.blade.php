@props(['link' => '/', 'title' => '', 'active' => false])
<li>
    <a href="{{ $link }}"
        class="block text-left px-3 py-2 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white {{ $active ? 'bg-blue-500 text-white' : '' }}"
        {{ $attributes }}>
        {{ ucfirst($title) }}
    </a>
</li>
