@php $editing = isset($event) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="rsvp_one_id" label="First RSVP" required>
            @php $selected = old('rsvp_one_id', ($editing ? $event->rsvp_one_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="rsvp_two_id" label="Second RSVP (Optional)">
            @php $selected = old('rsvp_two_id', ($editing ? $event->rsvp_two_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.select name="rsvp_three_id" label="Thrid RSVP (Optional)">
            @php $selected = old('rsvp_three_id', ($editing ? $event->rsvp_three_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <div x-data="coverComponentData()">
            <label for="cover">Cover</label><br />

            <img
                :src="coverDataUrl"
                style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc;"
            /><br />

            <div class="mt-2">
                <input
                    type="file"
                    name="cover"
                    id="cover"
                    @change="fileChanged"
                />
            </div>

            @error('cover')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="title"
            label="Title"
            value="{{ old('title', ($editing ? $event->title : '')) }}"
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
            >{{ old('description', ($editing ? $event->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.textarea
            name="schedule"
            label="Schedule"
            maxlength="255"
            required
            >{{ old('schedule', ($editing ? $event->schedule : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.text
            name="venue"
            label="Venue"
            value="{{ old('venue', ($editing ? $event->venue : '')) }}"
            maxlength="255"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.datetime
            name="date_time"
            label="Date Time"
            value="{{ old('date_time', ($editing ? optional($event->date_time)->format('Y-m-d\TG:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>
</div>

@push('scripts')
<script>

    /* Alpine component for cover uploader viewer */
    function coverComponentData() {
        return {
            coverDataUrl: '{{ $editing && $event->cover ? \Storage::url($event->cover) : '' }}',

            fileChanged(event) {
                fileToDataUrl(event, src => this.coverDataUrl = src)
            }
        }
    }
</script>
@endpush
