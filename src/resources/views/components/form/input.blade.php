@props([
  'label' => null,
  'name' => null,
  'value' => null,
  'type' => 'text',
])

@if($label)
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
@endif

<input id="{{ $name }}" {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)])
  ->merge(['type' => $type])}} value="{{ old($name, $value) }}" name="{{ $name }}">

@error($name)
  <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror