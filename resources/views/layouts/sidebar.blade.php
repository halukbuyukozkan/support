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

<x-side-accordion :title="__('System')" icon="fas fa-cogs" :active="request()->routeIs(['role.*','permission.*'])">
    <x-side-link href="{{ route('role.index') }}" icon="fas fa-users" :active="request()->routeIs('role.*')">
        {{ __('Roles') }}
    </x-side-link>
    <x-side-link href="{{ route('permission.index') }}" icon="fas fa-list"
        :active="request()->routeIs('permission.*')">
        {{ __('Permissions') }}
    </x-side-link>
</x-side-accordion>
