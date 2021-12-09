@props(['option', 'selected' => false])

<option value="{{ $option->id }}" {{ $selected && 'selected' }}>{{ ucfirst($option->name) }}</option>
