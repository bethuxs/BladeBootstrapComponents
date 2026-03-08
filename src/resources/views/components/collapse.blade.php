@props([
  'title' => null,
  'id' => null,
])

@php
  $collapseId = $id ?? 'collapse-' . uniqid();
@endphp

<div class="card">
  @if($title)
    <div class="card-header">
      <h5 class="mb-0">
        <button
          class="btn btn-link"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#{{ $collapseId }}"
          aria-expanded="false"
          aria-controls="{{ $collapseId }}"
        >
          {{ $title }}
        </button>
      </h5>
    </div>
  @endif
  <div id="{{ $collapseId }}" class="collapse" data-bs-parent=".card">
    <div class="card-body">
      {{ $slot }}
    </div>
  </div>
</div>
