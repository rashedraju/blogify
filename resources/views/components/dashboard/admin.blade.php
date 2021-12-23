@php
$actions = [
    ['title' => 'All Posts', 'link' => 'admin/posts'],
    ['title' => 'Create Post', 'link' => 'admin/posts/create'],
    ['title' => 'Campaigns', 'link' => 'admin/newsletters/campaigns']
];
@endphp

<x-dashboard :actions="$actions">
    {{ $slot }}
</x-dashboard>

