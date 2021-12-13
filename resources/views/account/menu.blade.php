<div class="card">
    <div class="card-header">
        {{ __('Account') }}
    </div>
    <div class="list-group list-group-flush">
        <x-list-link href="{{ route('account.settings') }}" :active="request()->routeIs('account.settings')"
            icon="fas fa-cog">
            {{ __('Settings') }}
        </x-list-link>
        <x-list-link href="{{ route('account.security') }}" :active="request()->routeIs('account.security')"
            icon="fas fa-shield-alt">
            {{ __('Security') }}
        </x-list-link>
    </div>
</div>
