@php($title = $role->exists ? __('Edit :role Role', ['role' => $role->name]) : __('Create Role'))
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $title }}
        </h2>
    </x-slot>

    <form method="post" enctype="multipart/form-data"
        action="{{ $role->exists ? route('admin.role.update', $role) : route('admin.role.store') }}">
        @csrf
        @if ($role->exists)
            @method('PUT')
        @endif
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $role->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="permissions">{{ __('Permissions') }}</label>
                    <select class="form-control @error('permissions') is-invalid @enderror" id="permissions"
                        name="permissions[]" multiple>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}"
                                {{ $role->permissions->contains($permission) ? 'selected' : '' }}>
                                {{ $permission->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('permissions')
                        <span class="invalid-feedback" role="alert">
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
