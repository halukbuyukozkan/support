@php($title = $platform->exists ? __('Edit :platform Platform', ['platform' => $platform->name]) : __('Create Platform'))
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $title }}
        </h2>
    </x-slot>

    <form method="post" enctype="multipart/form-data"
        action="{{ $platform->exists ? route('admin.platform.update', $platform) : route('admin.platform.store') }}">
        @csrf
        @if ($platform->exists)
            @method('PUT')
        @endif
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $platform->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="logo">{{ __('Logo') }}</label>
                    <input id="logo" type="file" class="form-control" name="logo" value="{{ $platform->logo }}" autocomplete="logo">
                    @if ($platform->logo)
                    <img src="{{ asset('storage/platforms/' . $platform->logo) }}" alt="{{ $platform->logo }}"
                        class="mt-3" style="max-height: 100px">
                    @endif
                    @error('logo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="domain">{{ __('Domain') }}</label>
                    <input type="text" class="form-control @error('domain') is-invalid @enderror" id="domain"
                        name="domain" value="{{ old('domain', $platform->domain) }}" required>
                    @error('domain')
                        <span class="invalid-feedback" permission="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @if($platform->statuses->count()!= 0)
                <div class="form-group">
                    <label for="status_id">{{ __('Default Status') }}</label>
                    <select name="status_id" class="form-control" aria-label="Default select example" @if($platform->statuses->count()==0) disabled @endif >
                            @if($platform->statuses->count()== 0) <option value="">{{ __('No Status') }}</option> @endif
                            <option value="" class="text-muted">{{ __('Select Status') }}</option>
                        @foreach ($platform->statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
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
