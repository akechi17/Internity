<div class="form-group input-radio">
    <label class="form-label">{{ $label }}</label>

    <div class="form-input">
        {{ $checkboxItem }}
    </div>

    @error($name)
        <x-validation :message="$message" />
    @enderror
</div>
