@extends('layouts.master')

@section('content')
<section class="ftco-section">
    @include('partials.subscribe')
    <div class="container">
        @forelse ($sermons as $sermon)
        @if ($sn++ % 2 != 0)
        <div class="row no-gutters d-flex sermon-wrap ftco-animate bg-light">
            <div class="col-md-6 d-flex align-items-stretch js-fullheight ftco-animate">
                <a href="#" class="img" style="background-image: url({{ \Storage::url($sermon->photo) }});"></a>
            </div>
            <div class="col-md-6 py-4 py-md-5 ftco-animate d-flex align-items-center">
                <div class="text p-md-5">
                    <h2 class="mb-4"><a href="#">{{ $sermon->title }}</a></h2>
                    <div class="meta">
                        <p>
                            <span>Minister: <a href="#" class="ptr">{{ $sermon->minister->nickname }}</a></span>
                            {{-- <span>Categories: <a href="#">God</a>, <a href="#">Pray</a>, <a href="#">Faith</a></span> --}}
                            <span><a href="#">On {{ $sermon->created_at->format('l jS M, Y') }}</a></span>
                        </p>
                    </div>
                    <p>{{ $sermon->description }}</p>
                    <p class="mt-4 btn-customize">
                        @if ($sermon->video)
                        <a href="{{ $sermon->video ? $sermon->video : '#' }}"
                            class="btn btn-primary px-4 py-3 mr-md-2 popup-vimeo"><span class="fa fa-play"></span> Watch
                            Video</a>
                        @endif
                        <a href="{{ \Storage::url($sermon->audio) }}"
                            class="btn btn-primary btn-outline-primary px-4 py-3 ml-lg-2"><span
                                class="fa fa-download"></span> Download MP3 Audio</a>
                    </p>
                </div>
            </div>
        </div>
        @else
        <div class="row no-gutters d-flex sermon-wrap ftco-animate bg-light">
            <div class="col-md-6 d-flex align-items-stretch js-fullheight ftco-animate order-md-last">
                <a href="#" class="img" style="background-image: url({{ \Storage::url($sermon->photo) }});"></a>
            </div>
            <div class="col-md-6 py-4 py-md-5 ftco-animate d-flex align-items-center">
                <div class="text p-md-5">
                    <h2 class="mb-4"><a href="#">{{ $sermon->title }}</a></h2>
                    <div class="meta">
                        <p>
                            <span>Minister: <a href="#" class="ptr">{{ $sermon->minister->nickname }}</a></span>
                            {{-- <span>Categories: <a href="#">God</a>, <a href="#">Pray</a>, <a href="#">Faith</a></span> --}}
                            <span><a href="#">On {{ $sermon->created_at->format('l jS M, Y') }}</a></span>
                        </p>
                    </div>
                    <p>{{ $sermon->description }}</p>
                    <p class="mt-4 btn-customize">
                        @if ($sermon->video)
                        <a href="{{ $sermon->video ? $sermon->video : '#' }}"
                            class="btn btn-primary px-4 py-3 mr-md-2 popup-vimeo"><span class="fa fa-play"></span> Watch
                            Video</a>
                        @endif
                        <a href="{{ \Storage::url($sermon->audio) }}"
                            class="btn btn-primary btn-outline-primary px-4 py-3 ml-lg-2"><span
                                class="fa fa-download"></span> Download MP3 Audio</a>
                    </p>
                </div>
            </div>
        </div>
        @endif
        @empty 
        <div class="text-center">
            <h2>There Are No Sermons For Download At This Time</h2>
            <p>Please subscribe, and we will keep you updated.</p>
        </div>
        @endforelse
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li class="">{!! $sermons->render() !!}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.subscribe')
@endsection