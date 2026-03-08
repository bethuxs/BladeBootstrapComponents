@props([
  'title' => null,
])

<div class="text-center py-5">
  <svg class="bi flex-shrink-0 mb-3" width="80" height="80" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z"/>
  </svg>
  @if($title)
    <h5 class="text-muted">{{ $title }}</h5>
  @else
    <h5 class="text-muted">{{ __('No results found') }}</h5>
  @endif
  <p class="text-muted">{{ $slot }}</p>
</div>
