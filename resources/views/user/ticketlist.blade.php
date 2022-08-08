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
                <h2 class="h4 font-weight-bold">
                    {{ __('Tickets') }}
                    <a href="{{ route('user.ticket.create') }}" class="btn btn-sm btn-primary float-right">
                        <i class="fa fa-plus"></i>
                        {{ __('Create Ticket') }}
                    </a>
                </h2>
            </div>
            <div class="col-md-10">
                @foreach ($tickets as $ticket)
                <div class="card">
                    <a href="{{ route('user.ticket.message.index',$ticket) }}">
                    <div class="card-header">{{ $ticket->title }}</div>
                    <div class="card-body">
                        <div>
                            {{ $ticket->note }}
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
