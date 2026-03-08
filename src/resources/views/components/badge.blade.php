@props([
  'variant' => 'primary',
  'pill' => false,
])

<span {{ $attributes->class(['badge', "bg-$variant", 'rounded-pill' => $pill]) }}>
  {{ $slot }}
</span>
