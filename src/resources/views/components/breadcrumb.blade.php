@props([
  'items' => [],
])

@if(count($items) > 0)
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      @foreach($items as $item)
        @if($loop->last)
          <li class="breadcrumb-item active" aria-current="page">
            {{ $item['label'] }}
          </li>
        @else
          <li class="breadcrumb-item">
            @if(isset($item['url']))
              <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
            @else
              {{ $item['label'] }}
            @endif
          </li>
        @endif
      @endforeach
    </ol>
  </nav>
@endif
