@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('events.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.events.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.rsvp_one_id')</h5>
                    <span>{{ optional($event->firstRsvp)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.rsvp_two_id')</h5>
                    <span>{{ optional($event->secondRsvp)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.rsvp_three_id')</h5>
                    <span>{{ optional($event->thridRsvp)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.cover')</h5>
                    <img
                        src="{{ $event->cover ? \Storage::url($event->cover) : '' }}"
                        style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc;"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.title')</h5>
                    <span>{{ $event->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.description')</h5>
                    <span>{{ $event->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.schedule')</h5>
                    <span>{{ $event->schedule ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.venue')</h5>
                    <span>{{ $event->venue ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.address')</h5>
                    <span>{{ $event->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.date_time')</h5>
                    <span>{{ $event->date_time ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('events.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Event::class)
                <a href="{{ route('events.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
