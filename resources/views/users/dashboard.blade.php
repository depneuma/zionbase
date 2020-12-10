@extends('layouts.app')

@section('content')
<!-- SECTION TABLE START -->
<div class="section-full p-t80 p-b50">
    <div class="container">
        <!-- TABLE RESPONSIVE -->
        <div class="section-head text-center">
            <h3 class="text-uppercase">{{ $subTitle }}</h3>
            <div class="wt-separator-outer">
                <div class="wt-separator bg-primary"></div>
            </div>
        </div>
        
        @include('partials.flash')
        @error('*')
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>Error!</strong> {{ $message }}
            </div>
        @enderror
    </div>
</div>
<!-- SECTION TABLE  END -->
@endsection