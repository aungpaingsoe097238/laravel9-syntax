<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        value="{{ old($name,$defaultValue) }}"
        name="{{ $multiple ? $name."[]" : $name  }}"
        class="form-control @error($name) is-invalid @enderror  @error("$name.*") is-invalid @enderror "
        @isset($form) form="{{ $form }}" @endisset
        @isset($multiple) multiple @endisset
    >
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    @isset($multiple)
        @error($name.".*")
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endisset
</div>
