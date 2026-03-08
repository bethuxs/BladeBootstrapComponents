@props([
  'name',
  'label' => null,
  'options' => [],
  'value' => null,
  'inline' => false,
])

@if($label)
  <fieldset class="border-0 mb-3">
    <legend class="form-label">{{ $label }}</legend>
@endif

<div @if($inline) class="d-flex gap-2" @endif>
  @foreach($options as $optionValue => $optionLabel)
    <div class="form-check @if($inline) form-check-inline @endif">
      <input
        id="{{ $name }}_{{ $optionValue }}"
        type="radio"
        class="form-check-input"
        name="{{ $name }}"
        value="{{ $optionValue }}"
        @checked(old($name, $value) == $optionValue)
        {{ $attributes }}
      />
      <label class="form-check-label" for="{{ $name }}_{{ $optionValue }}">
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
