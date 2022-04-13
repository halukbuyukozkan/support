<x-side-link href="{{ route('dashboard') }}" icon="fas fa-home" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
</x-side-link>

@if (auth()->user()->hasAnyPermission(['management.user', 'management.role']))
    <x-side-accordion :title="__('System')" icon="fas fa-cogs" :active="request()->routeIs('admin.*')">
        @if (auth()->user()->hasPermissionTo('management.user'))
            <x-side-link href="{{ route('admin.user.index') }}" icon="fas fa-users" :active="request()->routeIs('admin.user.*')">
                {{ __('Users') }}
            </x-side-link>
        @endif
        @if (auth()->user()->hasPermissionTo('management.role'))
            <x-side-link href="{{ route('admin.role.index') }}" icon="fas fa-users-cog" :active="request()->routeIs('admin.role.*')">
                {{ __('Roles') }}
            </x-side-link>
            <x-side-link href="{{ route('admin.permission.index') }}" icon="fas fa-list" :active="request()->routeIs('admin.permission.*')">
                {{ __('Permissions') }}
            </x-side-link>
        @endif
    </x-side-accordion>
@endif
