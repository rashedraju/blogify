@props(['key', 'default' => false])
<style>
    .toggle-checkbox:checked {
      @apply: right-0 border-blue-500;
      right: 0;
      border-color: rgb(59,130,246);
    }
    .toggle-checkbox:checked + .toggle-label {
      @apply: bg-blue-500;
      background-color: rgb(59,130,246);
    }
</style>

<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
    <input type="hidden" name="{{ $key }}" value="0">
    <input
      type="checkbox"
      name="{{ $key }}"
      id="{{ $key }}"
      value="1"
      {{ $default || old($key, 0) === 1 ? "checked" : "" }}
      class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
    />
    <label
        id="{{ $key }}"
        class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer">
    </label>
</div>
