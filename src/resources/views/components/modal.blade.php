@props([
  'id',
  'title' => null,
  'size' => null,
  'centered' => false,
  'scrollable' => false,
])

@php
  $sizeClass = match($size) {
    'sm' => 'modal-sm',
    'lg' => 'modal-lg',
    'xl' => 'modal-xl',
    default => '',
  };
@endphp

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
  <div {{ $attributes->class(['modal-dialog', $sizeClass, 'modal-dialog-centered' => $centered, 'modal-dialog-scrollable' => $scrollable]) }}>
    <div class="modal-content">
      @if($title)
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="{{ $id }}Label">{{ $title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
        </div>
      @endif
      <div class="modal-body">
        {{ $slot }}
      </div>
      @if($summary = $__env->getConsumableViewData()['summary'] ?? null)
        <div class="modal-footer">
          {{ $summary }}
        </div>
      @endif
    </div>
  </div>
</div>
