<textarea {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }} name="{{$name}}">{{ old($name, $value) }}</textarea>

@error($name)
  <div class="invalid-feedback">{{ $message }}</div>
@enderror

