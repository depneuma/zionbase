@extends('layouts.master')

@section('content')
<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-8 d-flex">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="services-2">
                            <div class="icon"><span class="flaticon-church"></span></div>
                            <div class="text">
                                <h4>Our Mission</h4>
                                <span class="subheading">What We Do</span>
                                <p>{{ config('settings.church_mission') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-2">
                            <div class="icon"><span class="flaticon-pray"></span></div>
                            <div class="text">
                                <h4>Our Vision</h4>
                                <span class="subheading">What We See</span>
                                <p>{{ config('settings.church_vision') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-2">
                            <div class="icon"><span class="flaticon-love"></span></div>
                            <div class="text">
                                <h4>Our Core Values</h4>
                                <span class="subheading">What We Believe</span>
                                <p>{!! nl2br(e(config('settings.church_values') )) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="services-2 services-block">
                    <div class="text">
                        <h4>{{ config('settings.church_name') }}</h4>
                        <p>{{ config('settings.church_description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 pl-md-5 py-md-5">
                <div class="heading-section pt-md-5 mb-4">
                    <span class="subheading">{{ config('settings.church_name') }}</span>
                    <h2 class="mb-5">About The Founder</h2>
                    <p>{{ config('settings.church_founder') }}</p>
                    <p>{{ $founder->about }}</p>
                    {{-- <p><a href="#" class="btn btn-primary">Learn More</a></p> --}}
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0"
                    style="background-image:url({{ \Storage::url($founder->avatar) }});">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0"
                    style="background-image:url({{ \Storage::url(config('settings.full_logo')) }});">
                </div>
            </div>
            <div class="col-md-6 pl-md-5 py-md-5">
                <div class="heading-section pt-md-5 mb-4">
                    <span class="subheading">{{ config('settings.church_name') }}</span>
                    <h2 class="mb-5">The Ministry Logo</h2>
                    <p>{{ config('settings.church_logo') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Leaders</span>
                <h2>Our Leadership Team</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($leaders as $leader)
            <div class="col-md-6 col-lg-3">
                <div class="staff">
                    <div class="img"
                        style="background-image: url({{ \Storage::url($leader->avatar) }});">
                    </div>
                    <div class="text text-1">
                        <h3>{{ $leader->nickname }}</h3>
                        <span>{{ $leader->office }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection