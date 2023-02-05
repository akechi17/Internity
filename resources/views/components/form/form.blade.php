<div>
    <form action="{{ $formAction }}" method="{{ $formMethod }}" class="form-input">
        @csrf
        @method($formMethod)

        <div class="header">
            <h6 class="text-uppercase">{{ $formTitle }}</h6>
        </div>

        <div class="row">
            {{ $formBody }}
        </div>
    </form>
</div>
