<button type="submit" {{ $attributes->merge([
    "class" => "bg-blue-500 px-8 py-2 my-5 text-white hover:bg-blue-600 rounded-xl"
])}}>
    {{$slot}}
</button>
