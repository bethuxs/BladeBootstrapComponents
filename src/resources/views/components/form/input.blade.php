<input {{ $attributes->merge(['type' => 'text', 'class' => 'form-control']) }} value="{{ old($name, $value) }}" name="{{$name}}">
