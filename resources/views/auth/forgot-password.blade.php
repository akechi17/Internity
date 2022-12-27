<form action="{{ route('forgot-password') }}" method="POST">
    @csrf
    <p>Enter your email address and we'll send you a link to reset your password.</p>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
    </div>
    <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
</form>
