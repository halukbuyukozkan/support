@php($title = $ticketmessage->exists ? __('Edit :ticketmessage Ticket', ['ticketmessage' => $ticketmessage->name]) : __('Create Ticket Message'))
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $title }}
        </h2>
    </x-slot>

    <form method="post" enctype="multipart/form-data"
        action="{{ $ticketmessage->exists ? route('admin.ticketmessage.update', $ticketmessage) : route('admin.ticketmessage.store') }}">
        @csrf
        @if ($ticketmessage->exists)
            @method('PUT')
        @endif
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="message">{{ __('Message') }}</label>
                    <input type="text" class="form-control @error('message') is-invalid @enderror" id="message"
                        name="message" value="{{ old('message', $ticketmessage->message) }}" required>
                    @error('message')
                        <span class="invalid-feedback" user="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ticket_id">{{ __('Ticket') }}</label>
                            <select name="ticket_id" class="form-control" aria-label="Default select example">
                                @foreach ($tickets as $ticket)
                                    <option value="{{ $ticket->id }}">{{ $ticket->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_id">{{ __('User') }}</label>
                                <select name="user_id" class="form-control" aria-label="Default select example">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
