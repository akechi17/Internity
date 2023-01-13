<form action="{{ route('verification.resend') }}" method="POST">
    @csrf
    <p>Before proceeding, please check your email for a verification link.</p>
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Click here to request another</button>.
</form>
