<x-guest-layout>

    <div class="container-fluid my-5 pt-5 px-5">
        <div class="row justify-content-center">
            <div class="col-md-10 py-2">
                <h2 class="h4 font-weight-bold">
                    {{ __('Tickets') }}
                    <a href="{{ route('user.ticket.create') }}" class="btn btn-sm btn-primary float-right">
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
                            <a class="stretched-link" style="color: black" href="{{ route('user.ticket.show',$ticket) }}">
                            <div class="fw-bold"><b>{{ $ticket->title }}</b></div>
                            {{ $ticket->note }}
                            </a>
                        </div>
                        <span class="badge bg-primary rounded-pill">{{ $ticket->ticketmessages->count() }}</span>
                    </li>
                </ol>
                @endforeach
            </div>
        </div>
    </div>

</x-guest-layout>
