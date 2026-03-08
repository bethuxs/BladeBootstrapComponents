@props([
  'items' => [],
  'brand' => 'MyApp',
  'brandUrl' => '/',
  'active' => null,
  'dark' => false,
])

<nav class="navbar navbar-expand-lg @if($dark) navbar-dark bg-dark @else navbar-light bg-light @endif">
  <div class="container-fluid">
    @if($brand)
      <a class="navbar-brand" href="{{ $brandUrl }}">{{ $brand }}</a>
    @endif
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        @foreach($items as $item)
          @if($item['divider'] ?? false)
            <li class="nav-item"><hr class="dropdown-divider"></li>
          @else
            <li class="nav-item">
              <a
                class="nav-link @if($item['id'] === $active) active @endif"
                @if($item['id'] === $active) aria-current="page" @endif
                href="{{ $item['url'] ?? '#' }}"
              >
                {{ $item['label'] }}
              </a>
            </li>
          @endif
        @endforeach
      </ul>
    </div>
  </div>
</nav>
