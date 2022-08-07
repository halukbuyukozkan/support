<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Ticket Messages') }}
            <a href="{{ route('admin.ticketmessage.create') }}" class="btn btn-sm btn-primary float-right">
                <i class="fa fa-plus"></i>
                {{ __('Create Ticket Message') }}
            </a>
        </h2>
    </x-slot>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Ticket') }}</th>
                        <th>{{ __('User') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Message') }}</th>
                        <th style="width: 200px">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ticketMessages as $message)
                        <tr>
                            <td>{{ $message->message }}</td>

                            <td class="text-right text-nowrap">
                                <a href="{{ route('admin.ticketmessage.edit', $message) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                    <span class="d-none d-sm-inline">{{ __('Edit') }}</span>
                                </a>
                                <form action="{{ route('admin.ticketmessage.destroy', $message) }}" method="POST"
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
            {{ $ticketMessages->links() }}
        </div>
    </div>
</x-app-layout>
