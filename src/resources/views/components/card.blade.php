@props([
  'title' => null,
  'subtitle' => null,
  'footer' => null,
])

<div class="card">
  @if($title)
    <div class="card-header">
      <h5 class="card-title mb-0">{{ $title }}</h5>
      @if($subtitle)
        <small class="text-muted">{{ $subtitle }}</small>
      @endif
    </div>
  @endif
  <div class="card-body">
    {{ $slot }}
  </div>
  @if($footer)
    <div class="card-footer">
      {{ $footer }}
    </div>
  @endif
</div>
