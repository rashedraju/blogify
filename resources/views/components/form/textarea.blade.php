@props(['name', 'label' => null])

<x-form.label name="{{$name}}" label="{{ $label }}" />
<textarea
    name="{{$name}}" rows="5"
    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
    required
>{{$slot ?? old($name)}}</textarea>
<x-form.error name="{{$name}}"/>
