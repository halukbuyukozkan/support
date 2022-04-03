<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Security') }}
        </h2>
    </x-slot>

    <x-slot name="aside">
        @include('account.menu')
    </x-slot>

    <form method="post" action="{{ route('account.security.changepassword') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                {{ __('Change Password') }}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}"
                        required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_password">{{ __('New Password') }}</label>
                    <input type="password" name="new_password" id="new_password"
                        class="form-control @error('new_password') is-invalid @enderror"
                        placeholder="{{ __('New Password') }}" required>
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">{{ __('Confirm New Password') }}</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="form-control @error('new_password_confirmation') is-invalid @enderror"
                        placeholder="{{ __('Confirm New Password') }}" required>
                    @error('new_password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    {{ __('Change Password') }}
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
