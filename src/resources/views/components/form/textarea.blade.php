<textarea {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }} value="{{ old($name, $value) }}" name="{{$name}}"></textarea>

@error($name)
  <div class="invalid-feedback">{{ $message }}</div>
@enderror

