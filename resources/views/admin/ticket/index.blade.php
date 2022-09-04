<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Tickets') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('User') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Department') }}</th>
                        <th>{{ __('Service') }}</th>
                        <th>{{ __('Updated Date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $ticket)
                        <tr>
                            <td><a href="{{ route('admin.ticket.show', $ticket) }}"><strong>{{ $ticket->title }}</strong></a></td>
                            <td>{{ $ticket->user->name }}</td>
                            <td>{{ $ticket->status->name }}</td>
                            <td>{{ $ticket->department->name }}</td>
                            <td>@if ($ticket->service){{ $ticket->service->name }}@endif</td>
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
