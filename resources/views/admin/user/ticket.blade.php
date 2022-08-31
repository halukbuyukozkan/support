<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Tickets') }}
            <a href="{{ route('admin.user.ticket.create',$user) }}" class="btn btn-sm btn-primary float-right">
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
                    @forelse ($tickets as $ticket)
                        <tr>
                            <td><a href="{{ route('admin.user.ticket.show',['user' => $user,'ticket' => $ticket]) }}"
                                <span class="d-none d-sm-inline"><strong>{{ $ticket->title }}</strong></span>
                                </a></td>
                            <td>{{ $ticket->department->name }}</td>
                            <td>@if ($ticket->service){{ $ticket->service->name }}@endif</td>
                            <td>{{ $ticket->status->name }}</td>
                            <td>{{ $ticket->updated_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="99" class="text-center text-muted">
                                {{ __('No Tickets') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $tickets->links() }}
        </div>
    </div>
</x-app-layout>
