@props(['active', 'icon'])

@php
$classes = $active ?? false ? 'list-group-item list-group-item-action active font-weight-bolder' : 'list-group-item list-group-item-action';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($icon))
        <i class="{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>
</li>
