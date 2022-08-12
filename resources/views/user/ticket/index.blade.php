<x-guest-layout>

    <div class="container-fluid my-5 pt-5 px-5">
        <div class="row justify-content-center">
            <div class="col-md-10 py-2">
                <h2 class="h4 font-weight-bold">
                    {{ __('Tickets') }}
                    <a href="{{ route('customer.ticket.create') }}" class="btn btn-sm btn-primary float-right">
                        <i class="fa fa-plus"></i>
                        {{ __('Create Ticket') }}
                    </a>
                </h2>
            </div>
            <div class="col-md-10">
                @foreach ($tickets as $ticket)
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <a style="color: black" href="{{ route('customer.ticket.show',$ticket) }}">
                            <div class="fw-bold"><b>{{ $ticket->title }}</b></div>
                            {{ $ticket->note }}
                            </a>
                            <span class="badge bg-primary rounded-pill">{{ $ticket->ticketmessages->count() }}</span>
                        </div>
                        <form action="{{ route('customer.ticket.destroy', $ticket) }}" method="POST"
                            class="d-inline-block" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                                <span class="d-none d-sm-inline">{{ __('Delete') }}</span>
                            </button>
                        </form>
                    </li>
                </ol>
                @endforeach
            </div>
        </div>
    </div>

</x-guest-layout>
