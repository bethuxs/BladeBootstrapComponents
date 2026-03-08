@props([
  'method' => 'POST',
  'route' => null,
  'submit' => null,
])

<form {{ $attributes->merge(['method' => $method]) }} @if($route) action="{{ route($route) }}" @endif>
  @if($method !== 'GET')
    @csrf
  @endif
  @if($method !== 'GET' && $method !== 'POST')
    @method($method)
  @endif
  {{ $slot }}

  @if($submit)
    <button type="submit" class="btn btn-primary mt-3">{{ $submit }}</button>
  @endif
</form>