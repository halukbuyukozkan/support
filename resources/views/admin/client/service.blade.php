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
        <div class="row mb-4">
            <div class="col">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a @if(request()->routeIs('client.user.show*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.show', $user) }}"><i class="fas fa-user px-1"></i></i>Show</a>
                    </li>
                    <li class="nav-item">
                        <a @if(request()->routeIs('client.user.edit*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.edit', $user) }}"><i class="fas fa-edit px-1"></i>Edit</a>
                    </li>
                    <li class="nav-item">
                        <a @if(request()->routeIs('client.user.ticket*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.ticket.index', $user) }}"><i class="fas fa-ticket-alt px-1"></i>Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a @if(request()->routeIs('client.user.service*')) class="nav-link active" @else class="nav-link" @endif name="references" href="{{ route('client.user.service.index', $user) }}"><i class="fas fa-bookmark px-1"></i>Services</a>
                    </li>
                </ul>
            </div>
        <div>
    </section>
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
                    @foreach ($user->services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
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
