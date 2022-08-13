<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Services') }}
            <a href="{{ route('admin.user.service.create',$user) }}" class="btn btn-sm btn-primary float-right">
                <i class="fa fa-plus"></i>
                {{ __('Create Service') }}
            </a>
        </h2>
    </x-slot>

    <section>
        <div class="container mb-4">
            <div class="row">
                <div class="col">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a @if(request()->routeIs('admin.user.edit*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('admin.user.edit', $user) }}">Edit</a>
                        </li>
                        <li class="nav-item">
                            <a @if(request()->routeIs('admin.user.ticket*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('admin.user.ticket.index', $user) }}">Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a @if(request()->routeIs('admin.user.service*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('admin.user.service.index', $user) }}">Services</a>
                        </li>
                    </ul>
                </div>
            <div>
        </div>
    </section>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Platform') }}</th>
                        <th style="width: 200px">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->platform->name }}</td>
                            <td class="text-right text-nowrap">
                                <a href="{{ route('admin.user.service.edit',['user' => $user,'service' => $service]) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                    <span class="d-none d-sm-inline">{{ __('Edit') }}</span>
                                </a>
                                <form action="{{ route('admin.user.service.destroy', ['user' => $user,'service' => $service]) }}" method="POST"
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
        {{ $user->services->paginate(10) }}
        </div>
    </div>
</x-app-layout>
