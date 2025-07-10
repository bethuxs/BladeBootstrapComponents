@props([
  'name',
  'label' => null,
  'value' => null,
  'useIso' => false, // true = ISO code, false = emoji
])

@php
  // Load the countries data from the specified path
  // Adjust the path as necessary based on your project structure
  // This assumes the file is located in the BladeComponents package
  // If you have a different path, adjust accordingly
  // For example, if it's in resources, use resource_path('countries.php')
$countries = require base_path('vendor/bethuxs/blade-bootstrap-components/src/countries.php');
@endphp

{{-- Convert to associative array for easier access --}}

@if($label)
  <label for="{{ $name }}" class="form-label">{{ $label }}</label>
@endif

<select
  name="{{ $name }}"
  id="{{ $name }}"
  {{ $attributes->class(['form-select', 'is-invalid' => $errors->has($name)]) }}
>
  <option value="">Selecciona un país</option>

  @foreach ($countries as $country)
    @php
      $optionValue = $useIso ? $country['code'] : $country['emoji'];
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