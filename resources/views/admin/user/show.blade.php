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
                    <li class="nav-item">
                        <a @if(request()->routeIs('admin.user.service*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('admin.user.service.index', $user) }}"><i class="fas fa-bookmark px-1"></i>Services</a>
                    </li>
                </ul>
            </div>
        <div>
    </section>

    <div class="card col-md-6">
        <div class="card-header">
          Active Tickets
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <tbody>
                    @foreach ($activeTickets as $ticket)
                        <tr>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card col-md-6">
        <div class="card-header">
          Delete User
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.destroy', $user) }}" method="POST"
            class="d-inline-block" onsubmit="return confirm('{{ __('Are you sure?') }}');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
                <span class="d-none d-sm-inline">{{ __('Delete') }}</span>
            </button>
            </form>
        </div>
    </div>

</x-app-layout>
