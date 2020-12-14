@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('sermons.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.sermons.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.sermons.inputs.user_id')</h5>
                    <span>{{ optional($sermon->minister)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sermons.inputs.photo')</h5>
                    <img
                        src="{{ $sermon->photo ? \Storage::url($sermon->photo) : '' }}"
                        style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc;"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sermons.inputs.event_id')</h5>
                    <span>{{ optional($sermon->event)->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sermons.inputs.title')</h5>
                    <span>{{ $sermon->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sermons.inputs.description')</h5>
                    <span>{{ $sermon->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sermons.inputs.price')</h5>
                    <span>{{ $sermon->price ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sermons.inputs.audio')</h5>
                    @if($sermon->audio)
                    <a href="{{ \Storage::url($sermon->audio) }}" target="blank"
                        ><i class="icon ion-md-download"></i>&nbsp;Download</a
                    >
                    @else - @endif
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sermons.inputs.video')</h5>
                    <span>{{ $sermon->video ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sermons.inputs.pdf')</h5>
                    @if($sermon->pdf)
                    <a href="{{ \Storage::url($sermon->pdf) }}" target="blank"
                        ><i class="icon ion-md-download"></i>&nbsp;Download</a
                    >
                    @else - @endif
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('sermons.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Sermon::class)
                <a href="{{ route('sermons.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
