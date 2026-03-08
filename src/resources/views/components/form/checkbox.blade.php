@props([
  'name',
  'label' => null,
  'value' => null,
  'checked' => false,
])

<div class="form-check">
  <input
    id="{{ $name }}"
    type="checkbox"
    class="form-check-input"
    name="{{ $name }}"
    value="{{ $value }}"
    @checked(old($name, $checked))
    {{ $attributes }}
  />
  @if($label)
    <label class="form-check-label" for="{{ $name }}">
      {{ $label }}
    </label>
  @endif
</div>

@error($name)
  <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror
