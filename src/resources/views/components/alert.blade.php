@props([
  'type' => 'info',
  'dismissible' => true,
  'title' => null,
])

@php
  $typeMap = [
    'success' => 'alert-success',
    'danger' => 'alert-danger',
    'warning' => 'alert-warning',
    'info' => 'alert-info',
  ];
  $alertClass = $typeMap[$type] ?? $typeMap['info'];
@endphp

<div {{ $attributes->class(['alert', $alertClass, 'alert-dismissible fade show' => $dismissible]) }} role="alert">
  @if($title)
    <strong>{{ $title }}</strong>
  @endif
  {{ $slot }}
  @if($dismissible)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Close') }}"></button>
  @endif
</div>
