@props([
  'name',
  'label' => null,
  'value' => null,
  'useIso' => false,
  'placeholder' => null,
])

@php
$countries = require base_path('vendor/bethuxs/blade-bootstrap-components/src/countries.php');
@endphp

@if($label)
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
@endif

<select
  name="{{ $name }}"
  id="{{ $name }}"
  {{ $attributes->class(['form-select', 'is-invalid' => $errors->has($name)]) }}
>
  <option value="">{{ $placeholder ?? __('Select a country') }}</option>

  @foreach ($countries as $country)
    @php
      $optionValue = $useIso ? $country['iso'] : $country['emoji'];
      $isSelected = old($name, $value) == $optionValue;
    @endphp
    <option value="{{ $optionValue }}" @if($isSelected) selected @endif>
      {{ $country['emoji'] }} {{ $country['name'] }} {{ $country['native'] }}
    </option>
  @endforeach
</select>

@error($name)
  <div class="invalid-feedback">{{ $message }}</div>
@enderror