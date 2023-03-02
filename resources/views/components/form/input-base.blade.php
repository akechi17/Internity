<div class="form-group has-validation" style="{{ $attributes->get('style') ? 'pointer-events: none;' : '' }}">

    @if ($label)
        <label for="input-data">{{ $label }}</label>
    @endif

    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
        value="{{ $value ?? '' }}" @if($disabled) style="pointer-events: none; background-color: #e9ecef;" @endif
        {{ $attributes->get('required') ? 'required' : '' }} {{ $attributes->get('readonly') ? 'readonly' : '' }}
        {{ $attributes->get('disabled') ? 'disabled' : '' }} {{ $attributes->get('placeholder') ? 'placeholder=' . $attributes->get('placeholder') : '' }} />

    @error($name)
        <x-validation :message="$message" />
    @enderror
</div>
