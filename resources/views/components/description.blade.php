<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea
        id="{{ $name }}"
        cols="30"
        rows="5"
        class="form-control @error("$name") is-invalid @enderror"
        @isset($form) form="{{ $form }}" @endisset
        name="{{ $name }}">{{ old($name,$defaultValue) }}</textarea>
    @error("$name")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
