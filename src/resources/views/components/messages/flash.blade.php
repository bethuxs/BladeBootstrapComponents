@if (flash()->message)
<div class="alert {{ flash()->class }} alert-dismissible fade show" role="alert">
  {{ flash()->message }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Close') }}"></button>
</div>
@endif
