<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <div class="{{ $class }}">
        <input class="form-check-input" type="checkbox" value="" id="{{ $id }}">
        {{ $label }}
        {{-- <label class="form-check-label" for="{{ $for }}">
            Checkbox {{ $label }}
        </label> --}}
    </div>
</div>

{{-- Example Push Scripts to head --}}
@once
    @push('scripts')
        <script type="module">
            // Scripts here
        </script>
    @endpush
@endonce
