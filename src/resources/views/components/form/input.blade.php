@props([
  'label' => null,
  'name' => null,
  'value' => null,
])
@if($label)
  <label for="{{$name}}">{{ $label }}</label>
@endif

<input {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)])
  ->merge(['type' => 'text'])}} value="{{ old($name, $value) }}" name="{{$name}}">

@error($name)
  <div class="invalid-feedback">{{ $message }}</div>
@enderror