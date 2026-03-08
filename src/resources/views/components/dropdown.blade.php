@props([
  'label',
  'items' => [],
  'split' => false,
])

<div class="dropdown" {{ $attributes }}>
  <button
    class="btn btn-secondary dropdown-toggle"
    type="button"
    data-bs-toggle="dropdown"
    aria-expanded="false"
  >
    {{ $label }}
  </button>
  <ul class="dropdown-menu">
    @foreach($items as $item)
      @if($item['divider'] ?? false)
        <li><hr class="dropdown-divider"></li>
      @elseif($item['header'] ?? false)
        <li><h6 class="dropdown-header">{{ $item['label'] }}</h6></li>
      @elseif($item['url'] ?? false)
        <li>
          <a class="dropdown-item" href="{{ $item['url'] }}">
            {{ $item['label'] }}
          </a>
        </li>
      @else
        <li>
          <button type="button" class="dropdown-item" {{ $item['attributes'] ?? '' }}>
            {{ $item['label'] }}
          </button>
        </li>
      @endif
    @endforeach
  </ul>
</div>
