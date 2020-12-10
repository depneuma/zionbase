<div>
    <form action="{{ route('register') }}" method="POST" id="reg-form">
        @csrf
        <div class="form-group @error('name') has-error @enderror">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input id="name" type="text" class="form-control" name="name" placeholder="Enter Full Name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus
                    wire:model.lazy="name">
            </div>
            @error('name')
            <small class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group @error('email') has-error @enderror">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input id="email" type="email" class="form-control @error('email') has-error @enderror" name="email"
                    placeholder="Enter Email Address" value="{{ old('email') }}" required autocomplete="email"
                    wire:model.lazy="email">
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
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    placeholder="Enter Password" required autocomplete="new-password"
                    wire:model.debounce="password_confirmation">
            </div>
            @error('password_confirmation')
            <small class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>

        <div class="form-group @error('password') has-error @enderror">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Confirm Password" required wire:model.lazy="password">
            </div>
            @error('password')
            <small class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>

        {{-- <div class="form-group">
            <div class="input-group">
                <input class="form-check-input" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }}>

        <label class="form-check-label" for="terms">
            {{ __('I Agree') }}
        </label>
</div>
</div> --}}
<button type="submit" class="site-button-secondry text-uppercase btn-block m-b10">Create Account</button>
<span class="font-12">Already Have an Account? <a data-dismiss="modal" data-toggle="modal" data-target="#Login-form"
        class="text-primary">Login</a></span>
</form>
</div>