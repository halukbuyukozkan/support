@php($title = $status->exists ? __('Edit :status Status', ['status' => $status->name]) : __('Create Status'))
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $title }}
        </h2>
    </x-slot>

    <form method="post" enctype="multipart/form-data"
        action="{{ $status->exists ? route('admin.status.update',$status) : route('admin.status.store',$status) }}">
        @csrf
        @if ($status->exists)
            @method('PUT')
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $status->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback" user="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">{{ __('Status Type') }}</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">{{ __('Select Type') }}</option>
                                <option value="OPEN" {{ $status->type == 'OPEN' ? 'selected' : '' }}>
                                    {{ __('Open') }}
                                </option>
                                <option value="SUPPORT_WAITING" {{ $status->type == 'SUPPORT_WAITING' ? 'selected' : '' }}>
                                    {{ __('Support Waiting') }}
                                </option>
                                <option value="CUSTOMER_WAITING" {{ $status->type == 'CUSTOMER_WAITING' ? 'selected' : '' }}>
                                    {{ __('Customer Waiting') }}
                                </option>
                                <option value="SOLVED" {{ $status->type == 'SOLVED' ? 'selected' : '' }}>
                                    {{ __('Solved') }}
                                </option>
                                <option value="CLOSED" {{ $status->type == 'CLOSED' ? 'selected' : '' }}>
                                    {{ __('Closed') }}
                                </option>
                            </select>
                        </div>
                    </div>
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
