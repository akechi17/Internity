<div class="form-group has-validation">

    @if ($label)
        <label for="input-data">{{ $label }}</label>
    @endif

    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
        value="{{ $value ?? '' }}" />

    @error($name)
        <x-validation :message="$message" />
    @enderror
</div>
