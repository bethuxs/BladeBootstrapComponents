@props([
  'label',
  'contextual' => 'primary',
  'size' => null
])

@php
  $classes = ['btn', "btn-$contextual"];
  if ($size) {
    $classes[] = "btn-$size";
  }
@endphp

<button {{$attributes->class($classes)}}>
  {{$label ?? $slot}}
</button>