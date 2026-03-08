@props([
  'name',
  'label' => null,
  'value' => null,
  'checked' => false,
])

<div class="form-check">
  <input
    id="{{ $name }}_{{ $value }}"
    type="radio"
    class="form-check-input"
    name="{{ $name }}"
    value="{{ $value }}"
    @checked(old($name, $checked) == $value)
    {{ $attributes }}
  />
  @if($label)
    <label class="form-check-label" for="{{ $name }}_{{ $value }}">
      {{ $label }}
    </label>
  @endif
</div>

@error($name)
  <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror
