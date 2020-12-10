<div>
    <form action="{{ route('login') }}" method="POST" id="log-form">
        @csrf

        <div class="form-group @error('email') has-error @enderror">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="Enter Email Address" wire:model.lazy="email" value="{{ old('email') }}" required autocomplete="email"
                    autofocus>
            </div>
            @error('email')
            <small class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Enter Password" wire:model.lazy="password" required autocomplete="current-password">
            </div>
            @error('password')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="input-group">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <button type="submit" class="site-button-secondry text-uppercase btn-block m-b10">Submit</button>

        @if (Route::has('password.request'))
        <span class="font-12">{{ __('Forgot Your Password?') }}<a href="{{ route('password.request') }}"
                class="text-primary">
                Click Here</a></span> <br>
        @endif
        <span class="font-12">Don't have an account? <a data-dismiss="modal" data-toggle="modal"
                data-target="#Register-form" class="text-primary">Register
                Here</a></span>
    </form>
</div>