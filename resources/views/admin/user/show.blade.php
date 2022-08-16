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
            <div class="card card-danger">
                <div class="card-header">
                    <i class="fas fa-times"></i>
                    {{ __('Deleting') }}
                </div>
                <div class="card-body text-danger">
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
        </div>
    </div>

</x-app-layout>
