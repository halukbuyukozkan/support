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
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Department') }}</th>
                        <th>{{ __('Service') }}</th>
                        <th style="width: 200px">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->status->name }}</td>
                            <td>{{ $ticket->department->name }}</td>
                            <td>{{ $ticket->user->name }}</td>
                            <td>@if ($ticket->service){{ $ticket->service->name }}@endif</td>
                            <td class="text-right text-nowrap">
                                <a href="{{ route('admin.ticket.show', $ticket) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                    <span class="d-none d-sm-inline">{{ __('Messages') }}</span>
                                </a>
                                <form action="{{ route('admin.ticket.destroy', $ticket) }}" method="POST"
                                    class="d-inline-block" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                        <span class="d-none d-sm-inline">{{ __('Delete') }}</span>
                                    </button>
                                </form>
                            </td>
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
