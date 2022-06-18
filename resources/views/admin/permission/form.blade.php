@php($title = $permission->exists ? __('Edit :permission Permission', ['permission' => $permission->name]) : __('Create Permission'))
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $title }}
        </h2>
    </x-slot>

    <form method="post" enctype="multipart/form-data"
        action="{{ $permission->exists ? route('admin.permission.update', $permission) : route('admin.permission.store') }}">
        @csrf
        @if ($permission->exists)
            @method('PUT')
        @endif
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $permission->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback" permission="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
