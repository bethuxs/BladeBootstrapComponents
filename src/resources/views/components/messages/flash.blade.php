@if (flash()->message)
<div class=" alert {{ flash()->class }}">
  {{ flash()->message }}
</div>
@endif
