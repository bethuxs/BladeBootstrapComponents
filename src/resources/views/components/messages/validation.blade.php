@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ __('Please fix the following errors:') }}</strong>
    <ul class="mb-0 mt-2">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Close') }}"></button>
  </div>
@endif