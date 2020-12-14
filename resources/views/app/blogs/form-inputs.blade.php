@php $editing = isset($blog) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="user_id" label="Author" required>
            @php $selected = old('user_id', ($editing ? $blog->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="title"
            label="Title"
            value="{{ old('title', ($editing ? $blog->title : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.textarea name="body" label="Body" maxlength="255" required
            >{{ old('body', ($editing ? $blog->body : '')) }}</x-inputs.textarea
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
            imageDataUrl: '{{ $editing && $blog->image ? \Storage::url($blog->image) : '' }}',

            fileChanged(event) {
                fileToDataUrl(event, src => this.imageDataUrl = src)
            }
        }
    }
</script>
@endpush
