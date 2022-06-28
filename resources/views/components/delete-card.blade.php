@props(['active', 'icon'])

@php
$classes = $active ?? false ? 'delete-link active font-weight-bolder' : 'delete-link';
@endphp

<div class="card-body text-danger">
    <p>{{ __('Do you want to delete this company?') }}</p>
    <form action="{{ $slot }}" method="POST" class="d-inline-block"
        onsubmit="return confirm('{{ __('Are you sure?') }}');">
        @csrf
        @method('DELETE')
        <button class="btn btn-block btn-danger">
            <i class="fas fa-trash"></i>
            {{ __('Delete') }}
        </button>
    </form>
</div>
