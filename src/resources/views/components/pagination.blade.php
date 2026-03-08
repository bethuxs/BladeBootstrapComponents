@props([
  'title' => null,
  'subtitle' => null,
  'flush' => false,
  'horizontal' => false,
])

<nav aria-label="Page navigation example" {{ $attributes }}>
  <ul class="pagination @if($flush) pagination-sm @endif @if($horizontal) flex-wrap @endif">
    <!-- Previous Link -->
    @if($paginator->onFirstPage())
      <li class="page-item disabled">
        <span class="page-link">{{ __('pagination.previous') }}</span>
      </li>
    @else
      <li class="page-item">
        <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
          {{ __('pagination.previous') }}
        </a>
      </li>
    @endif

    <!-- Pagination Links -->
    @foreach($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
      @if($page == $paginator->currentPage())
        <li class="page-item active" aria-current="page">
          <span class="page-link">{{ $page }}</span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $url }}">{{ $page }}</a>
        </li>
      @endif
    @endforeach

    <!-- Next Link -->
    @if($paginator->hasMorePages())
      <li class="page-item">
        <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
          {{ __('pagination.next') }}
        </a>
      </li>
    @else
      <li class="page-item disabled">
        <span class="page-link">{{ __('pagination.next') }}</span>
      </li>
    @endif
  </ul>
</nav>
