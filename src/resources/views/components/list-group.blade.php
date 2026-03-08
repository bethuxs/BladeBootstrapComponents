@props([
  'items' => [],
  'flush' => false,
  'active' => null,
])

<div class="list-group @if($flush) list-group-flush @endif" {{ $attributes }}>
  @foreach($items as $item)
    @if($item['divider'] ?? false)
      <div class="list-group-item disabled" aria-disabled="true"></div>
    @elseif($item['header'] ?? false)
      <div class="list-group-item active" aria-current="true">
        <strong>{{ $item['label'] }}</strong>
      </div>
    @elseif($item['url'] ?? false)
      <a
        href="{{ $item['url'] }}"
        class="list-group-item list-group-item-action @if($item['id'] === $active) active @endif"
        @if($item['id'] === $active) aria-current="true" @endif
      >
        @if($item['badge'] ?? false)
          <div class="d-flex justify-content-between align-items-center">
            <div>{{ $item['label'] }}</div>
            <x-bs::badge>{{ $item['badge'] }}</x-bs::badge>
          </div>
        @else
          {{ $item['label'] }}
        @endif
      </a>
    @else
      <button
        type="button"
        class="list-group-item list-group-item-action @if($item['id'] === $active) active @endif"
        @if($item['id'] === $active) aria-current="true" @endif
        {{ $item['attributes'] ?? '' }}
      >
        @if($item['badge'] ?? false)
          <div class="d-flex justify-content-between align-items-center">
            <div>{{ $item['label'] }}</div>
            <x-bs::badge>{{ $item['badge'] }}</x-bs::badge>
          </div>
        @else
          {{ $item['label'] }}
        @endif
      </button>
    @endif
  @endforeach
</div>
