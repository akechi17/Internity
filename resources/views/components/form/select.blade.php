<div class="form-group">
    <label class="form-label">{{ $label }}</label>
    <select class="form-select" name="{{ $name }}">
        <option selected hidden value="">Pilih</option>
        {{ $options }}
    </select>

    @error($name)
        <x-validation :message="$message" />
    @enderror
</div>
