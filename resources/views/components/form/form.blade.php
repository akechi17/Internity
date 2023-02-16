<div>
    <form action="{{ $formAction }}" method="{{ $formMethod }}" class="form-data">
        @csrf
        @method($spoofMethod ?? $formMethod)

        <div class="header">
            <h6 class="text-uppercase">{{ $formTitle }}</h6>
        </div>

        <div class="row">
            {{ $formBody }}
        </div>

        <div class="footer">
            <a href="{{ url()->previous() }}" class="btn form-button btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </form>
</div>
