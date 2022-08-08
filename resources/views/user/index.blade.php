<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }
    </style>
</head>

<body>
    <div class="container-fluid fixed-top p-4">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-muted">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-muted">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                            @endif
                        @endif
                    </div>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 pt-5 px-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach ($messages as $message)
                <div class="card">
                    <div class="card-header">{{ $message->created_by }}</div>
                    <div class="card-body">
                        <div>
                            {{ $message->message }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-10">
                <form method="post" enctype="multipart/form-data"
                action="{{ route('user.ticket.message.store',$ticket) }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="message">{{ __('Message') }}</label>
                            <input type="text" class="form-control @error('message') is-invalid @enderror" id="message"
                                name="message" required>
                            @error('message')
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
        </div>
    </div>
</body>
</html>
