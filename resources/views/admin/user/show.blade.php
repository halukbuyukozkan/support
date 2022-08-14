<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User Detail') }}
        </h2>
    </x-slot>

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
