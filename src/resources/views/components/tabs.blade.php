@props([
  'items' => [],
])

@php
  $items = collect($items)->map(fn($item) => [
    'id' => $item['id'] ?? 'tab-' . uniqid(),
    'label' => $item['label'] ?? '',
    'active' => $item['active'] ?? false,
    'content' => $item['content'] ?? '',
  ]);
@endphp

<div {{ $attributes }}>
  <ul class="nav nav-tabs" role="tablist">
    @foreach($items as $item)
      <li class="nav-item" role="presentation">
        <button
          class="nav-link @if($item['active']) active @endif"
          id="{{ $item['id'] }}-tab"
          data-bs-toggle="tab"
          data-bs-target="#{{ $item['id'] }}"
          type="button"
          role="tab"
          aria-controls="{{ $item['id'] }}"
          aria-selected="@if($item['active']) true @else false @endif"
        >
          {{ $item['label'] }}
        </button>
      </li>
    @endforeach
  </ul>
  <div class="tab-content">
    @foreach($items as $item)
      <div
        class="tab-pane fade @if($item['active']) show active @endif"
        id="{{ $item['id'] }}"
        role="tabpanel"
        aria-labelledby="{{ $item['id'] }}-tab"
      >
        {!! $item['content'] !!}
      </div>
    @endforeach
  </div>
</div>
