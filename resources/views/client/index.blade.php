<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Clients') }}
            <a href="{{ route('client.user.create') }}" class="btn btn-sm btn-primary float-right">
                <i class="fa fa-plus"></i>
                {{ __('Create Client') }}
            </a>
        </h2>
    </x-slot>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th style="width: 200px">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clients as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-right text-nowrap">
                                <a href="{{ route('client.user.edit', $user) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                    <span class="d-none d-sm-inline">{{ __('Edit') }}</span>
                                </a>
                                <form action="{{ route('client.user.destroy', $user) }}" method="POST"
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
                    @empty
                        <tr>
                            <td colspan="99" class="text-center text-muted">
                                {{ __('No clients found.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $clients->links() }}
        </div>
    </div>
</x-app-layout>
