@php($title = $ticket->exists ? __('Edit :ticket Ticket', ['ticket' => $ticket->name]) : __('Create Ticket'))

<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $title }}
        </h2>
    </x-slot>

    <form method="post" enctype="multipart/form-data"
        action="{{ $ticket->exists ? route('customer.ticket.update', ['ticket' => $ticket,'message' => $message]) : route('customer.ticket.store') }}">
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
                                @foreach ($platform->departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="service_id">{{ __('Service') }}</label>
                            <select name="service_id" class="form-control" aria-label="Default select example">
                                    <option value="">{{ __('Service') }}</option>
                                @foreach ($platform->services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">{{ __('Message') }}</label>
                    <textarea type="text" class="form-control @error('message') is-invalid @enderror" id="message"
                        name="message" rows="3" required></textarea>
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
</x-app-layout>




