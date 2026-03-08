
@props([
  'label' => null,
  'name' => null,
  'value' => null,
  'rows' => 3,
])

@if($label)
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
@endif

<textarea id="{{ $name }}" {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }} name="{{ $name }}" rows="{{ $rows }}">{{ old($name, $value) }}</textarea>

@error($name)
  <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror