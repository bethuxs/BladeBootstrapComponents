@props([
  'id',
  'title' => null,
  'placement' => 'start',
  'backdrop' => true,
])

@php
  $placementClass = match($placement) {
    'end' => 'offcanvas-end',
    'bottom' => 'offcanvas-bottom',
    'top' => 'offcanvas-top',
    default => 'offcanvas-start',
  };
@endphp

<div
  class="offcanvas {{ $placementClass }}"
  tabindex="-1"
  id="{{ $id }}"
  aria-labelledby="{{ $id }}-label"
  @if(!$backdrop) data-bs-backdrop="false" @endif
>
  @if($title)
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="{{ $id }}-label">{{ $title }}</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="{{ __('Close') }}"></button>
    </div>
  @else
    <button type="button" class="btn-close position-absolute p-2" data-bs-dismiss="offcanvas" aria-label="{{ __('Close') }}"></button>
  @endif
  
  <div class="offcanvas-body">
    {{ $slot }}
  </div>
</div>
