<x-side-link href="{{ route('dashboard') }}" icon="fas fa-home" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
</x-side-link>

@if (auth()->user()->hasRole('Admin'))
<x-side-link href="{{ route('admin.ticket.index') }}" icon="fas fa-ticket-alt" :active="request()->routeIs('admin.ticket.*')">
    {{ __('Tickets') }}
</x-side-link>
@else
<x-side-link href="{{ route('ticket.index') }}" icon="fas fa-ticket-alt" :active="request()->routeIs('ticket.*')">
    {{ __('Tickets') }}
</x-side-link>
@endif
@if (auth()->user()->hasPermissionTo('management.user'))
<x-side-link href="{{ route('client.user.index') }}" icon="fas fa-users" :active="request()->routeIs('client.*')">
    {{ __('Clients') }}
</x-side-link>
<x-side-link href="{{ route('admin.department.index') }}" icon="fas fa-building" :active="request()->routeIs('admin.department.*')">
    {{ __('Departments') }}
</x-side-link>
<x-side-link href="{{ route('admin.status.index') }}" icon="fas fa-calendar-check" :active="request()->routeIs('admin.status.*')">
    {{ __('Statuses') }}
</x-side-link>
<x-side-link href="{{ route('admin.category.index') }}" icon="fas fa-columns" :active="request()->routeIs('admin.category.*')">
    {{ __('Categories') }}
</x-side-link>
@endif


@if (auth()->user()->hasAnyPermission(['management.user', 'management.role']))
        @if (auth()->user()->hasPermissionTo('management.platform'))
            @if (auth()->user()->hasPermissionTo('management.user'))
            <x-side-link href="{{ route('admin.user.index') }}" icon="fas fa-users" :active="request()->routeIs('admin.user.*')">
                {{ __('Users') }}
            </x-side-link>
            @endif
            <x-side-link href="{{ route('admin.role.index') }}" icon="fas fa-users-cog" :active="request()->routeIs('admin.role.*')">
                {{ __('Roles') }}
            </x-side-link>
            <x-side-link href="{{ route('admin.permission.index') }}" icon="fas fa-list" :active="request()->routeIs('admin.permission.*')">
                {{ __('Permissions') }}
            </x-side-link>
            <x-side-link href="{{ route('admin.platform.index') }}" icon="fab fa-buffer" :active="request()->routeIs('admin.platform.*')">
                {{ __('Platforms') }}
            </x-side-link>
        @endif
@endif
