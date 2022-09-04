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
                        <a @if(request()->routeIs('admin.user.show*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('admin.user.show', $user) }}"><i class="fas fa-user px-1"></i></i>Show</a>
                    </li>
                    <li class="nav-item">
                        <a @if(request()->routeIs('admin.user.edit*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('admin.user.edit', $user) }}"><i class="fas fa-edit px-1"></i>Edit</a>
                    </li>
                    <li class="nav-item">
                        <a @if(request()->routeIs('admin.user.ticket*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('admin.user.ticket.index', $user) }}"><i class="fas fa-ticket-alt px-1"></i>Tickets</a>
                    </li>
                </ul>
            </div>
        <div>
    </section>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{ __('User İnformation') }}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="card-text"><b>İsim:</b> {{ $user->name }}</p>
                        <p class="card-text"><b>Email:</b> {{ $user->email }}</p>
                    </li>
                </ul>
            </div>

            <x-delete-card href="{{ route('admin.user.destroy',$user) }}" :route="route('admin.user.destroy', $user)">
                {{ __('Do you want to delete user ?') }}
            </x-delete-card>

        </div>
        <div class="col-md-8">
            @if($activeTickets->count() != 0)
            <div class="card">
                <div class="card-header">
                    {{ __('Active Tickets') }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($activeTickets->take(5) as $ticket)
                    <li class="list-group-item"><a href="{{ route('admin.user.ticket.show',['user' => $user,'ticket' => $ticket]) }}">
                        <strong>{{ $ticket->title }}</strong></a>
                    </li>
                    @endforeach
                </ul>
                @if($activeTickets->count() >= 6)
                <div class="card-footer">
                    <div class="text-center">
                        <a href="{{ route('admin.user.ticket.index',$user) }}"><strong>{{__('See all')}}</strong></a>
                    </div>
                </div>
                @endif
            </div>
            @endif
            @if($user->services->count()!=0)
            <div class="card">
                <div class="card-header">
                    {{ __('Services') }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($user->services as $service)
                    <li class="list-group-item">{{ $service->name }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

</x-app-layout>
