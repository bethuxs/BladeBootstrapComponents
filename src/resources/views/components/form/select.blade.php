@props([
  'name',
  'label' => null,
  'value' => null,
  'options' => [],
  'placeholder' => null,
])

@if($label)
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
@endif

<select id="{{ $name }}" {{ $attributes->class(['form-select', 'is-invalid' => $errors->has($name)])}} name="{{ $name }}">
  @if($placeholder)
    <option value="">{{ $placeholder }}</option>
  @endif
  @foreach($options as $key => $option)
    <option value="{{ $key }}" @selected(old($name, $value) == $key)>{{ $option }}</option>
  @endforeach
</select>

@error($name)
  <div class="invalid-feedback">{{ $message }}</div>
@enderror