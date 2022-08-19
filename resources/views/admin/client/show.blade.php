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
                <h5 class="card-header">{{ __('User İnformation') }}</h5>
                <div class="card-body">
                  <h5 class="card-title">İsim: {{ $user->name }}</h5>
                  <p class="card-text">Email: {{ $user->email }}</p>
                </div>
              </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Active Tickets
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($activeTickets as $ticket)
                    <li class="list-group-item">{{ $ticket->title }}</li>
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
