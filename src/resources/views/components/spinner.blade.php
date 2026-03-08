@props([
  'type' => 'border',
  'size' => null,
  'label' => null,
])

@php
  $sizeClass = match($size) {
    'sm' => 'spinner-sm',
    'lg' => 'spinner-lg',
    default => '',
  };
@endphp

@if($type === 'border')
  <div {{ $attributes->class(['spinner-border', $sizeClass]) }} role="status">
    @if($label)
      <span class="visually-hidden">{{ $label }}</span>
    @endif
  </div>
@elseif($type === 'grow')
  <div {{ $attributes->class(['spinner-grow', $sizeClass]) }} role="status">
    @if($label)
      <span class="visually-hidden">{{ $label }}</span>
    @endif
  </div>
@endif
