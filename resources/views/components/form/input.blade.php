@props(['name', 'type' => 'text', 'label' => null])

<x-form.label name="{{$name}}" label="{{ $label ?? $name }}" />
<input
    type="{{$type}}"
    name="{{$name}}"
    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
    {{$attributes(['value' => old($name)])}}
>
<x-form.error name="{{$name}}"/>
