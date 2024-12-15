<select {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)])}} name="{{$name}}">
  @if($placeholder)
    <option value="">{{ $placeholder }}</option>
  @endif
  @foreach($options as $key => $option)
    <option value="{{ $key }}" @selected(old($name) == $key)>{{ $option }}</option>
  @endforeach
</select>

@error($name)
  <div class="invalid-feedback">{{ $message }}</div>
@enderror