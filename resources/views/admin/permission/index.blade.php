<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Permissions') }}
            <a href="{{ route('admin.permission.create') }}" class="btn btn-sm btn-primary float-right">
                <i class="fa fa-plus"></i>
                {{ __('Create Permission') }}
            </a>
        </h2>
    </x-slot>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th style="width: 200px">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td class="text-right text-nowrap">
                                <a href="{{ route('admin.permission.edit', $permission) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                    <span class="d-none d-sm-inline">{{ __('Edit') }}</span>
                                </a>
                                <form action="{{ route('admin.permission.destroy', $permission) }}" method="POST"
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
            {{ $permissions->links() }}
        </div>
    </div>
</x-app-layout>
