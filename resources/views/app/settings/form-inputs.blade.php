@php $editing = isset($setting) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="key"
            label="Key"
            value="{{ old('key', ($editing ? $setting->key : '')) }}"
            maxlength="255"
            disabled
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.textarea name="value" label="Value" maxlength="255"
            >{{ old('value', ($editing ? $setting->value : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <div x-data="imageComponentData()">
            <label for="image">Image</label><br />

            <img
                :src="imageDataUrl"
                style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc;"
            /><br />

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChanged"
                />
            </div>

            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </x-inputs.group>
</div>

@push('scripts')
<script>

    /* Alpine component for image uploader viewer */
    function imageComponentData() {
        return {
            imageDataUrl: '{{ \Storage::url(config('settings.'.$setting->key)) }}',

            fileChanged(event) {
                fileToDataUrl(event, src => this.imageDataUrl = src)
            }
        }
    }
</script>
@endpush
