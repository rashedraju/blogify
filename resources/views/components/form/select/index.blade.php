@props(['label', 'name'])

<x-form.label name="{{ $label }}"/>
<select name="{{ $name }}" id=""
    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-5">
        {{ $slot }}
</select>
