<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="aside">
        @include('account.menu')
    </x-slot>

    <div class="card">
        <div class="card-header">
            {{ __('Settings') }}
        </div>
        <div class="card-body">
            You're logged in!
        </div>
    </div>
</x-app-layout>
