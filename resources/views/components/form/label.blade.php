@props(['name', 'label' => null])
<label for="{{$name}}" class="block text-gray-700 text-sm font-bold mb-2 mt-5">{{ucwords($label ?? $name)}}</label>
