<x-app-layout>

    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Ticket Messages') }}
        </h2>
    </x-slot>
    <div class="container-fluid my-5 px-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach ($ticket->messages as $message)
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <a class="stretched-link" style="color: black" href="{{ route('customer.ticket.message.index',$ticket) }}">
                            <div class="fw-bold"><b>{{ $message->user->name }}</b></div>
                            {{ $message->message }}
                            </a>
                        </div>
                    </li>
                </ol>
                @endforeach
            </div>
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data"
                action="{{ route('customer.ticket.message.store',$ticket) }}">
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



