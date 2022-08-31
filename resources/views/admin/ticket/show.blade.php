<x-app-layout>

<x-slot name="header">
    <div class="row">
        <div class="col">
            <h2 class="h4 font-weight-bold">
                {{ $ticket->title }} {{ __('Ticket Messages') }}
            </h2>
        </div>
        <div class="col">
            @if(request()->routeIs('admin.*'))
            <a href="{{ route('admin.user.ticket.index',$user) }}">
            @else
            <a href="{{ route('client.user.ticket.index',$user) }}">
            @endif
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
            <form method="post" enctype="multipart/form-data"
            @if(request()->routeIs('admin.user.*'))
            action="{{ route('admin.user.ticket.update',['user'=>$user,'ticket'=>$ticket]) }}">
            @elseif(request()->routeIs('client.user.*'))
            action="{{ route('client.user.ticket.update',['user'=>$user,'ticket'=>$ticket]) }}">
            @elseif(request()->routeIs('admin.ticket.*'))
            action="{{ route('admin.ticket.update',$ticket) }}">
            @endif
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
                                <option value="{{ $department->id }}" {{ $ticket->department == $department ? 'selected' : '' }}>{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service_id">{{ __('Service') }}</label>
                        <select name="service_id" class="form-control" aria-label="Default select example"@if($platform->services->count() == 0) disabled @endif>
                                @if($platform->services->count()== 0) <option value="">{{ __('No Service') }}</option> @endif
                                <option value="">{{ __('Select Service') }}</option>
                            @foreach ($platform->services as $service)
                                <option value="{{ $service->id }}" {{ $ticket->service == $service ? 'selected' : '' }}>{{ $service->name }}</option>
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
                        <select name="status_id" class="form-control" aria-label="Default select example" @if($platform->statuses->count() == 0) disabled @endif>
                            <option value="" class="text-muted">{{ __('Select Status') }}</option>
                            @foreach ($platform->statuses as $status)
                                <option value="{{ $status->id }}" {{ $ticket->status == $status ? 'selected' : '' }}>{{ $status->name }}</option>
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
            <form method="post" enctype="multipart/form-data"
            @if(request()->routeIs('admin.user.*'))
            action="{{ route('admin.user.ticket.message.store',['user'=>$user,'ticket'=>$ticket]) }}">
            @elseif(request()->routeIs('admin.ticket.*'))
            action="{{ route('admin.ticket.message.store',$ticket) }}">
            @else
            action="{{ route('client.user.ticket.message.store',['user'=>$user,'ticket'=>$ticket]) }}">
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
                        <div class="input-group-prepend">
                          <button class="btn btn-primary" type="submit">Reply</button>
                        </div>
                        <select name="status_id" class="form-control" aria-label="Default select example" @if($platform->statuses->count() == 0) disabled @endif>
                            <option value="" class="text-muted">{{ __('Select Status') }}</option>
                            @foreach ($platform->statuses as $status)
                                <option value="{{ $status->id }}" {{ $ticket->status == $status ? 'selected' : '' }}>{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

</x-app-layout>
