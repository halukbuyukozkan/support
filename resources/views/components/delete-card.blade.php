@props(['active', 'route'])

@php
$classes = $active ?? false ? 'delete-link active font-weight-bolder' : 'delete-link';
@endphp

<div class="card card-danger">
    <div class="card-header">
        <i class="fas fa-times"></i>
        {{ __('Deleting') }}
    </div>
    <div class="card-body text-danger">
        <p>{{ $slot }}</p>
        <form action="{{ $route }}"method="POST" class="d-inline-block"
            onsubmit="return confirm('{{ __('Are you sure?') }}');">
            @csrf
            @method('DELETE')
            <button class="btn btn-block btn-danger">
                <i class="fas fa-trash"></i>
                {{ __('Delete') }}
            </button>
        </form>
    </div>
</div>
