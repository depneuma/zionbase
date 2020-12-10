<div class="card mb-4">
    <div class="card-header">
        <h3>{{ __('Update Social Links') }}</h3>
    </div>
    <div class="card-body">
        <p>
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
        <div class="mt-3">
            <form>
                <div class="form-group row">
                    <label for="current_password"
                        class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                    <div class="col-md-6">
                        <input id="current_password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                            required autocomplete="current-password" placeholder="{{ __('Current Password') }}">

                        @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
