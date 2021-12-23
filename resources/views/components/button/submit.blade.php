@props(['background' => 'bg-blue-500 hover:bg-blue-600'])
<button type="submit"
    {{ $attributes->merge([
        'class' => "px-8 py-2 my-5 text-white rounded-xl $background",
    ]) }}>
    {{ $slot }}
</button>
