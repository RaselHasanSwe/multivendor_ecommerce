<div class="login-toggle">
    Returning customer? <a href="#" class="show-login font-weight-bold text-uppercase text-dark">Login</a>
</div>
<form class="login-content" action='{{ route('login') }}' method="POST">
    @csrf
    <p>If you have shopped with us before, please enter your details below.
        If you are a new customer, please proceed to the Billing section.</p>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control form-control-md" name="email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-md" name="password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group checkbox">
        <input type="checkbox" class="custom-checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember" class="mb-0 lh-2">Remember me</label>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="ml-3">Last your password?</a>
        @endif
    </div>
    <button type="submit" class="btn btn-rounded btn-login mt-2">Login</button>
</form>
