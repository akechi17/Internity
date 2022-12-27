<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group
        @error('email')
            has-error
        @enderror
    ">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        @error('email')
            <span class="help-block">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group
        @error('password')
            has-error
        @enderror
    ">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
        @error('password')
            <span class="help-block
                @error('email')
                    help-block-email
                @enderror
            ">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Login</button>

    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
</form>
