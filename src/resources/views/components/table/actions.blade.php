<div class="btn-group" role="group">
    @if(isset($viewRoute))
        <a class="btn btn-info" href="{{ $viewRoute }}">
            <i class="fa fa-eye" aria-hidden="true"></i>
            <span class="visually-hidden">{{ __('View') }}</span>
        </a>
    @endif
    @if(isset($editRoute))
        <a class="btn btn-warning" href="{{ $editRoute }}">
            <i class="fa fa-edit" aria-hidden="true"></i>
            <span class="visually-hidden">{{ __('Edit') }}</span>
        </a>
    @endif
    @if(isset($deleteRoute))
        <form action="{{ $deleteRoute }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Estás seguro?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i>
                <span class="visually-hidden">{{ __('Delete') }}</span>
            </button>
        </form>
    @endif
</div>
