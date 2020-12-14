@php $editing = isset($sermon) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="user_id" label="Minister" required>
            @php $selected = old('user_id', ($editing ? $sermon->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <div x-data="photoComponentData()">
            <label for="photo">Photo</label><br />

            <img
                :src="photoDataUrl"
                style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc;"
            /><br />

            <div class="mt-2">
                <input
                    type="file"
                    name="photo"
                    id="photo"
                    @change="fileChanged"
                />
            </div>

            @error('photo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="event_id" label="Event (Optional)">
            @php $selected = old('event_id', ($editing ? $sermon->event_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Event</option>
            @foreach($events as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="title"
            label="Title"
            value="{{ old('title', ($editing ? $sermon->title : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $sermon->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="price" label="Price">
            @php $selected = old('price', ($editing ? $sermon->price : '')) @endphp
            <option value="free" {{ $selected == 'free' ? 'selected' : '' }} >Free</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <label for="audio">Audio</label>

        <input type="file" name="audio" id="audio" class="form-control-file" />
        @if($editing && $sermon->audio)
        <div class="mt-2">
            <a href="{{ \Storage::url($sermon->audio) }}" target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;Download</a
            >
        </div>
        @endif @error('audio')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="video"
            label="Video"
            value="{{ old('video', ($editing ? $sermon->video : '')) }}"
            maxlength="255"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <label for="pdf">PDF</label>

        <input type="file" name="pdf" id="pdf" class="form-control-file" />
        @if($editing && $sermon->pdf)
        <div class="mt-2">
            <a href="{{ \Storage::url($sermon->pdf) }}" target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;Download</a
            >
        </div>
        @endif @error('pdf')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </x-inputs.group>
</div>

@push('scripts')
<script>

    /* Alpine component for photo uploader viewer */
    function photoComponentData() {
        return {
            photoDataUrl: '{{ $editing && $sermon->photo ? \Storage::url($sermon->photo) : '' }}',

            fileChanged(event) {
                fileToDataUrl(event, src => this.photoDataUrl = src)
            }
        }
    }
</script>
@endpush
