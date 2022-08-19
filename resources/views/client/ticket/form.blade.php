@php($title = $ticket->exists ? __('Edit :ticket Ticket', ['ticket' => $ticket->name]) : __('Create Ticket'))
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $title }}
        </h2>
    </x-slot>

    <form method="post" enctype="multipart/form-data"
        action="{{ $ticket->exists ? route('client.user.ticket.update',['ticket'=>$ticket,'user'=>$user]) : route('client.user.ticket.store',['ticket'=>$ticket,'user'=>$user]) }}">
        @csrf
        @if ($ticket->exists)
            @method('PUT')
        @endif
        <div class="card">
            <div class="card-body">
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
                <div class="form-group">
                    <label for="department_id">{{ __('Department') }}</label>
                    <select name="department_id" class="form-control" aria-label="Default select example">
                            <option value="">{{ __('Select Department') }}</option>
                        @foreach ($platform->departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="service_id">{{ __('Service') }}</label>
                    <select name="service_id" class="form-control" aria-label="Default select example"@if($platform->services->count() == 0) disabled @endif>
                            @if($platform->services->count()== 0) <option value="">{{ __('No Service') }}</option> @endif
                            <option value="">{{ __('Select Service') }}</option>
                        @foreach ($platform->services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="note">{{ __('Note') }}</label>
                    <input type="text" class="form-control @error('note') is-invalid @enderror" id="note"
                        name="note" value="{{ old('note', $ticket->note) }}">
                    @error('note')
                        <span class="invalid-feedback" user="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_id">{{ __('Status') }}</label>
                    <select name="status_id" class="form-control" aria-label="Default select example" @if($statuses->count() == 0) disabled @endif>
                        <option value="" class="text-muted">{{ __('Select Status') }}</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
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
