@props([
  'label',
  'contextual' => 'primary',
  'size' => null,
  'type' => 'button',
])

@php
  $classes = ['btn', "btn-$contextual"];
  if ($size) {
    $classes[] = "btn-$size";
  }
@endphp

<button type="{{ $type }}" {{ $attributes->class($classes) }}>
  {{ $label ?? $slot }}
</button>