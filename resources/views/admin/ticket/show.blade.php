<x-app-layout>

<x-slot name="header">
    <h2 class="h4 font-weight-bold">
        {{ __('Tickets') }}
    </h2>
</x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach ($ticket->ticketmessages as $message)
                <ol class="list-group list-group-numbered my-1">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <b>{{ $message->user->name }}</b>
                                <small class="mx-1 text-secondary">{{ $message->created_at }}</small>
                            </div>
                            <div>
                                {{ $message->message }}
                            </div>
                        </div>
                        @if($message->user_id == Auth::user()->id)
                            <form action="{{ route('admin.ticket.message.destroy',['ticket' => $ticket,'message'=> $message]) }}" method="POST"
                                class="d-inline-block" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger float-right">
                                    <i class="fas fa-trash"></i>
                                    <span class="d-none d-sm-inline">{{ __('Delete') }}</span>
                                </button>
                            </form>
                        @endif
                    </li>
                </ol>
                @endforeach
            </div>
            <div class="col-md-10">
                <form method="post" enctype="multipart/form-data"
                action="{{ route('admin.ticket.message.store',$ticket) }}">
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
    </div>
</x-app-layout>
