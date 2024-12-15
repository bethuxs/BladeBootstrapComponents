<form {{ $attributes }} @if($attributes->get('route')) action="{{ route($attributes->get('route')) }}" @endif>
  <x-bs::flash />
  @if($attributes->get('method') != 'get')
    @csrf
  @endif
  {{$slot}}
</form>