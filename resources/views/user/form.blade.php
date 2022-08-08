@php($title = $ticket->exists ? __('Edit :ticket Ticket', ['ticket' => $ticket->name]) : __('Create Ticket'))

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

<x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $title }}
        </h2>
</x-slot>


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
                    {{ __('Create Ticket') }}
                </h2>
            </div>
            <div class="col-md-10">
                <form method="post" enctype="multipart/form-data"
                action="{{ $ticket->exists ? route('user.ticket.update', $ticket) : route('user.ticket.store') }}">
                @csrf
                @if ($ticket->exists)
                    @method('PUT')
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="title"
                                        name="title" value="{{ old('title', $ticket->title) }}" required>
                                    @error('title')
                                        <span class="invalid-feedback" user="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="department_id">{{ __('Department') }}</label>
                                    <select name="department_id" class="form-control" aria-label="Default select example">
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="service_id">{{ __('Service') }}</label>
                                    <select name="service_id" class="form-control" aria-label="Default select example">
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="note">{{ __('Note') }}</label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror" id="title"
                                name="note" value="{{ old('note', $ticket->note) }}" required>
                            @error('note')
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
    </div>
</body>


