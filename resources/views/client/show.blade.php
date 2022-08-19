<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User Detail') }}
        </h2>
    </x-slot>

    <section>
        <div class="row mb-4">
            <div class="col">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a @if(request()->routeIs('client.user.show*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.show', $user) }}"><i class="fas fa-user px-1"></i></i>Show</a>
                    </li>
                    <li class="nav-item">
                        <a @if(request()->routeIs('client.user.edit*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.edit', $user) }}"><i class="fas fa-edit px-1"></i>Edit</a>
                    </li>
                    <li class="nav-item">
                        <a @if(request()->routeIs('client.user.ticket*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.ticket.index', $user) }}"><i class="fas fa-ticket-alt px-1"></i>Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a @if(request()->routeIs('client.user.service*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.service.index', $user) }}"><i class="fas fa-bookmark px-1"></i>Services</a>
                    </li>
                </ul>
            </div>
        <div>
    </section>

    <div class="row">
        <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <b>{{ __('Services') }}</b>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($user->services as $service)
                    <li class="list-group-item">{{ $service->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <b>{{ __('Active Tickets') }}</b>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($activeTickets as $ticket)
                    <li class="list-group-item">{{ $ticket->title }}<form action="{{ route('client.user.ticket.destroy', ['user' => $user,'ticket' => $ticket]) }}" method="POST"
                        class="d-inline-block float-right" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            <span class="d-none d-sm-inline">{{ __('Delete') }}</span>
                        </button>
                    </form></li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-delete-card href="{{ route('client.user.destroy',$user) }}" :route="route('client.user.destroy', $user)">
                {{ __('Dashboard') }}
            </x-delete-card>
        </div>
    </div>

</x-app-layout>
