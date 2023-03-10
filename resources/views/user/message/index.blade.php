<x-app-layout>

    <x-slot name="header">
        <div class="row">
            <div class="col">
                <h2 class="h4 font-weight-bold">
                    {{ $ticket->title }} {{ __('Ticket Messages') }}
                    
                </h2>
            </div>
            <div class="col">
                <a href="{{ route('ticket.index') }}">
                    <button class="btn btn-sm btn-danger float-right" type="submit"><i class="fas fa-chevron-left mr-1"></i>Close Ticket</button>    
                </a>
            </div>     
        </div>
    </x-slot>
    
    
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <b>{{ __('User İnformation') }}</b>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="card-text"><b>İsim:</b> {{ $user->name }}</p>
                        <p class="card-text"><b>Email:</b> {{ $user->email }}</p>
                    </li>
                </ul>
            </div>
            @if($ticket->service)
            <div class="card">
                <div class="card-header">
                    <b>{{ __('Services') }}</b>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $ticket->service->name }}</li>
                </ul>
            </div>
            @endif
            
            @if(request()->routeIs('admin.user.*'))
            <x-delete-card href="{{ route('admin.user.ticket.destroy',['user'=>$user,'ticket'=>$ticket]) }}" :route="route('admin.user.ticket.destroy',['user'=>$user,'ticket'=>$ticket])">
                {{ __('Do you want to delete ticket ?') }}
            </x-delete-card>
            @elseif(request()->routeIs('client.user.*'))
            <x-delete-card href="{{ route('client.user.ticket.destroy',['user'=>$user,'ticket'=>$ticket]) }}" :route="route('client.user.ticket.destroy',['user'=>$user,'ticket'=>$ticket])">
                {{ __('Do you want to delete ticket ?') }}
            </x-delete-card>
            @endif
        </div>
        <div class="col-md-8">
            @foreach ($ticket->messages as $message)
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
                        <form action="{{ route('ticket.message.destroy',['ticket' => $ticket,'message'=> $message]) }}" method="POST"
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
            <form method="post" enctype="multipart/form-data"
            @if(request()->routeIs('user.*'))
            action="{{ route('user.ticket.message.store',['user'=>$user,'ticket'=>$ticket]) }}">
            @elseif(request()->routeIs('ticket.*'))
            action="{{ route('ticket.message.store',$ticket) }}">
            @endif
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
                    <div class="input-group mb-3 col-md-4">
                        <div class="input-group">
                            <button class="btn btn-primary" type="submit">Reply</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    
    </x-app-layout>
    