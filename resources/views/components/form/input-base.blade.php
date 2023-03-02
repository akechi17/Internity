<div class="form-group has-validation" style="{{ $attributes->get('style') ? 'pointer-events: none;' : '' }}">

    @if ($label)
        <label for="input-data">{{ $label }}</label>
    @endif

    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
        value="{{ $value ?? '' }}" placeholder="ex: {{ $placeholder ?? '' }}"
        @if($disabled) style="pointer-events: none; background-color: #e9ecef;" @endif
        @if($readonly) readonly style="background-color: #e9ecef; pointer-events: none;" @endif


    @error($name)
        <x-validation :message="$message" />
    @enderror
</div>
