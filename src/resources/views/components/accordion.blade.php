@props([
  'items' => [],
  'flush' => false,
])

<div class="accordion @if($flush) accordion-flush @endif" {{ $attributes }}>
  @foreach($items as $index => $item)
    @php
      $id = $item['id'] ?? 'accordion-item-' . $index;
      $isOpen = $item['open'] ?? ($index === 0);
    @endphp
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button
          class="accordion-button @if(!$isOpen) collapsed @endif"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#{{ $id }}-body"
          aria-expanded="@if($isOpen) true @else false @endif"
          aria-controls="{{ $id }}-body"
        >
          {{ $item['title'] }}
        </button>
      </h2>
      <div
        id="{{ $id }}-body"
        class="accordion-collapse collapse @if($isOpen) show @endif"
        data-bs-parent="#{{ $attributes->get('id') ?? 'accordion' }}"
      >
        <div class="accordion-body">
          {!! $item['content'] !!}
        </div>
      </div>
    </div>
  @endforeach
</div>
