@php($title = $user->exists ? __('Edit :user User', ['user' => $user->name]) : __('Create User'))
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $title }}
        </h2>
    </x-slot>

    <section>
            <div class="row mb-4">
                <div class="col">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a @if(request()->routeIs('client.user.show*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.show', $user) }}"><i class="fas fa-user px-1"></i></i>Show</a>
                        </li>
                        <li class="nav-item">
                            <a @if(request()->routeIs('client.user.edit*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.edit', $user) }}"><i class="fas fa-edit px-1"></i>Edit</a>
                        </li>
                        <li class="nav-item">
                            <a @if(request()->routeIs('client.user.ticket*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.ticket.index', $user) }}"><i class="fas fa-ticket-alt px-1"></i>Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a @if(request()->routeIs('client.user.service*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.service.index', $user) }}"><i class="fas fa-bookmark px-1"></i>Services</a>
                        </li>
                    </ul>
                </div>
            <div>
    </section>
    <form method="post" enctype="multipart/form-data"
        action="{{ $user->exists ? route('client.user.update', $user) : route('client.user.store') }}">
        @csrf
        @if ($user->exists)
            @method('PUT')
        @endif
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback" user="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span class="invalid-feedback" user="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password">
                    @error('password')
                        <span class="invalid-feedback" user="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{ __('Password Confirmation') }}</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                        <span class="invalid-feedback" user="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
