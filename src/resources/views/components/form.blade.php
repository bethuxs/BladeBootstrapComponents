<form {{ $attributes }} @if($attributes->get('route')) action="{{ route($attributes->get('route')) }}" @endif>
  @if($attributes->get('method') != 'get')
    @csrf
  @endif
  {{$slot}}
</form>