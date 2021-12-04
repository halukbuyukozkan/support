<x-side-accordion title="Example" icon="fas fa-home" :active="request()->routeIs('dashboard')">
    <x-side-link href="{{ route('dashboard') }}" icon="fas fa-home" :active="request()->routeIs('dashboard')">
        {{ __('Home') }}
    </x-side-link>

    <x-side-link href="{{ route('dashboard') }}" icon="fas fa-desktop" :active="request()->routeIs('dashboard')">
        {{ __('Example') }}
    </x-side-link>
</x-side-accordion>
<x-side-link href="{{ route('dashboard') }}" icon="fas fa-book" :active="request()->routeIs('dashboard')">
    {{ __('Example') }}
</x-side-link>
