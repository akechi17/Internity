<div class="input-password form-group">
    <div class="input-label">
        <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    </div>
    <div class="input-item">
        <input class="form-control password" type="password" name="{{ $name }}" id="{{ $id }}"
            value="{{ $value ?? '' }}" autocomplete="new-password">
        <div class="toggle-password">
            <iconify-icon icon="mdi:eye-off" class="icon"></iconify-icon>
        </div>
    </div>

    @error($name)
        <x-validation :message="$message" />
    @enderror
</div>


@once
    @push('scripts')
        <script type="module">
            $(document).ready(function() {
                $(".toggle-password").click(function() {
                    const passwordInput = $(this).parent().find(".password");
                    const icon = $(this).find(".icon");

                    passwordInput.attr("type", passwordInput.attr("type") === "password" ? "text" : "password");
                    icon.attr("icon", icon.attr("icon") === "mdi:eye-off" ? "mdi:eye" : "mdi:eye-off");
                });
            });
        </script>
    @endpush
@endonce
