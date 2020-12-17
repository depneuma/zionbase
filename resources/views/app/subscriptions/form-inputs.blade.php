@php $editing = isset($subscription) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-md-12 col-lg-12">
        <x-inputs.email
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $subscription->email : '')) }}"
            maxlength="255"
        ></x-inputs.email>
    </x-inputs.group>
</div>
