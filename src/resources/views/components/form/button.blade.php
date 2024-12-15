@props([
  'label',
  'contextual' => 'primary'
])

<button {{$attributes->class(['btn', "btn-$contextual"])}}>
  {{$label ?? $slot}}
</button>