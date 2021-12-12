@php
$actions = [
    ['title' => 'All Posts', 'link' => 'admin/posts'],
    ['title' => 'Create Post', 'link' => 'admin/posts/create']
];
@endphp

<x-dashboard :actions="$actions">
    {{ $slot }}
</x-dashboard>

