@props([
  'name',
  'label' => null,
  'accept' => null,
  'multiple' => false,
])

@if($label)
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
@endif

<input
  id="{{ $name }}"
  type="file"
  class="form-control @error($name) is-invalid @enderror"
  name="{{ $name }}{{ $multiple ? '[]' : '' }}"
  @if($accept) accept="{{ $accept }}" @endif
  @if($multiple) multiple @endif
  {{ $attributes }}
/>

@error($name)
  <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror
