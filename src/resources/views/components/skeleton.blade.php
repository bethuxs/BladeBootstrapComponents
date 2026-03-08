@props([
  'height' => '100px',
  'count' => 3,
])

@for($i = 0; $i < $count; $i++)
  <div class="placeholder-wave mb-3">
    <span class="placeholder" style="height: {{ $height }}; width: 100%;"></span>
  </div>
@endfor
