<div class="form-group">
    <label class="form-label">{{ $label }}</label>
    <select class="form-select" name="{{ $name }}">
        <option selected hidden>Pilih</option>
        {{ $options }}
    </select>

    @error($name)
        <x-validation :message="$message" />
    @enderror
</div>
