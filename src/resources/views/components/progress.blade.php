@props([
  'value' => 0,
  'max' => 100,
  'variant' => 'primary',
  'striped' => false,
  'animated' => false,
  'label' => null,
])

@php
  $percentage = ($value / $max) * 100;
@endphp

<div class="progress" role="progressbar" aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="{{ $max }}">
  <div {{ $attributes->class(['progress-bar', "bg-$variant", 'progress-bar-striped' => $striped, 'progress-bar-animated' => $animated]) }} style="width: {{ $percentage }}%">
    @if($label)
      {{ $label }}
    @elseif($percentage >= 10)
      {{ round($percentage) }}%
    @endif
  </div>
</div>
