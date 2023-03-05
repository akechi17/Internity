<div>
    <form action="{{ $formAction }}" method="{{ $formMethod }}" class="form-data" enctype="{{ $enctype ?? '' }}">
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
            @if($roleEdit == null)
                <button type="submit" class="btn form-button btn-primary">Simpan</button>
            @else
                @role($roleEdit)
                    <button type="submit" class="btn form-button btn-primary">Simpan</button>
                @endrole
            @endif
        </div>
    </form>
</div>
