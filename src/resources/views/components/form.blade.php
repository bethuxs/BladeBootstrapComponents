<form {{ $attributes }} @if($attributes->get('route')) action="{{ route($attributes->get('route')) }}" @endif>
  @if($attributes->get('method') != 'get')
    @csrf
  @endif
  {{$slot}}

  @if($attributes->get('submit'))
    <button type="submit" class="btn btn-primary mt-3">{{$attributes->get('submit')}}</button>
  @endif
</form>