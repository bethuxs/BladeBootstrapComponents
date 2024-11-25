<button {{$attributes->merge(['class' => 'btn btn-primary'])}}>
  {{$label ?? $slot}}
</button>