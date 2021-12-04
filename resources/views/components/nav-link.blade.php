@props(['active', 'icon'])

@php
$classes = $active ?? false ? 'nav-link active font-weight-bolder' : 'nav-link';
@endphp

<li class="nav-item">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        <i class="{{ $icon }}"></i>
        <span class="d-none d-sm-inline-block">{{ $slot }}</span>
    </a>
</li>
