@props(['option', 'selected' => true])

<option value="{{ $option->id }}" {{ $selected === true ? "selected" : "" }}>
    {{ ucfirst($option->name) }}
</option>
