@php $editing = isset($setting) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="key"
            label="Key"
            value="{{ old('key', ($editing ? $setting->key : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.textarea name="value" label="Value" maxlength="255"
            >{{ old('value', ($editing ? $setting->value : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
