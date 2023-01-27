<div id="verify-page">
    <div class="card d-flex align-items-center">
        <div class="card-body">
            <form action="{{ route('verification.resend') }}" method="POST">
                @csrf
                <img src="{{ asset('/img/logo-internity.png') }}" alt="Internity" />
                <p>Before proceeding, please check your email for a verification link.</p>
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Click here to request another</button>.
                <a href="#"> Back to Login </a>
            </form>
        </div>
    </div>
</div>
