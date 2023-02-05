<div class="form-group has-validation">
    <label for="input-data">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}" />

    @error($name)
        <x-alert type="alert-danger" :message="$message" />
    @enderror
</div>
