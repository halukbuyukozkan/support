<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Tickets') }}
            <a href="{{ route('client.user.ticket.create',$user) }}" class="btn btn-sm btn-primary float-right">
                <i class="fa fa-plus"></i>
                {{ __('Create Ticket') }}
            </a>
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
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Department') }}</th>
                        <th>{{ __('Service') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Updated Date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td><a href="{{ route('client.user.ticket.show',['user' => $user,'ticket' => $ticket]) }}"
                                class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                                <span class="d-none d-sm-inline">{{ $ticket->title }}</span>
                                </a></td>
                            <td>{{ $ticket->department->name }}</td>
                            <td>@if ($ticket->service){{ $ticket->service->name }}@endif</td>
                            <td>{{ $ticket->status->name }}</td>
                            <td>{{ $ticket->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $tickets->paginate(10) }}
        </div>
    </div>
</x-app-layout>
