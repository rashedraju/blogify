@props(["username"])
@php
$actions = [
    ["title" => "Profile", "link" => "{$username}/profile"],
    ["title" => "Bookmarks", "link" => "{$username}/bookmarks"],
    ["title" => "Followings", "link" => "{$username}/followings"],
    ["title" => "Followers", "link" => "{$username}/followers"],
    ["title" => "Visibilities", "link" => "{$username}/visibilities"]
];
@endphp

<x-dashboard :actions="$actions">
    {{ $slot }}
</x-dashboard>
