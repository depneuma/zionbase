@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="fixed-top" style="z-index: 1000000">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="my-3">{{ __('Website Settings') }}</h2>
                @livewire('settings.general')
                @livewire('settings.site-images')
                @livewire('settings.site-links')
            </div>
        </div>
    </div>
@endsection
