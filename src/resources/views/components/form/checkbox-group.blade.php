@props([
  'name',
  'label' => null,
  'options' => [],
  'values' => [],
  'inline' => false,
])

@if($label)
  <fieldset class="border-0 mb-3">
    <legend class="form-label">{{ $label }}</legend>
@endif

<div @if($inline) class="d-flex gap-2" @endif>
  @foreach($options as $value => $optionLabel)
    <div class="form-check @if($inline) form-check-inline @endif">
      <input
        id="{{ $name }}_{{ $value }}"
        type="checkbox"
        class="form-check-input"
        name="{{ $name }}[]"
        value="{{ $value }}"
        @checked(in_array($value, old($name, $values), true))
        {{ $attributes }}
      />
      <label class="form-check-label" for="{{ $name }}_{{ $value }}">
        {{ $optionLabel }}
      </label>
    </div>
  @endforeach
</div>

@if($label)
  </fieldset>
@endif

@error($name)
  <div class="invalid-feedback d-block">{{ $message }}</div>
@enderror
