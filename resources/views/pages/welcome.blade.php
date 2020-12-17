@extends('layouts.master')

@section('content')

<section class="ftco-section ftco-no-pb bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0"
                    style="background-image:url({{ \Storage::url(config('settings.church_about')) }});">
                </div>
            </div>
            <div class="col-md-6 pl-md-5 py-md-5">
                <div class="heading-section pt-md-5 mb-4">
                    <span class="subheading">Welcome to {{ config('settings.seo_meta_title') }}</span>
                    <h2 class="mb-5">About Our Church</h2>
                    <p>{{ config('settings.church_description') }}</p>
                    <p><a href="{{ route('pages.about') }}" class="btn btn-primary">Learn More</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Events</span>
                <h2>Upcoming Event</h2>
            </div>
        </div>
        <div class="row">
            @if ($event)
            <div class="col-md-12 event-wrap d-md-flex ftco-animate">
                <div class="img" style="background-image: url({{ \Storage::url($event->cover) }});">
                </div>
                <div class="text p-4 px-md-5 d-flex align-items-center">
                    <div class="desc">
                        <h2 class="mb-4"><a href="#">{{ $event->title }}</a></h2>
                        <div class="meta">
                            <p>
                                <span><i class="fa fa-calendar mr-2" style="white-space: pre-wrap;"></i>{!! nl2br(e(
                                    $event->schedule )) !!}</span>
                                <span><i class="fa fa-map-marker mr-2"></i> <a href="#">{{ $event->venue }}</a></span>
                                <span><i class="fa fa-building mr-2"></i> {{ $event->address }}</span>
                                <span><i class="fa fa-phone mr-2"></i> RSVP:
                                    {{ $event->firstRsvp->name.', '.$event->firstRsvp->mobile }}</span>
                            </p>
                        </div>
                        <p><a href="{{ route('pages.events') }}" class="btn btn-primary">More Events</a></p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Our Blog</span>
                <h2>Your Life News Devotional</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($blogs as $blog)
            <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20"
                        style="background-image: url({{ \Storage::url($blog->image) }});">
                    </a>
                    <div class="text p-4">
                        <div class="meta mb-2">
                            <div><a href="#">{{ $blog->created_at->format('F jS, Y') }}</a></div>
                            <div><a href="#">{{ $blog->author->nickname }}</a></div>
                            <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> [3]</a></div>
                        </div>
                        <h3 class="heading"><a href="#">{{ $blog->title }}</a></h3>
                        <p>{{ Str::words($blog->body, 25) }}</p>
                        <p><a href="{{ route('pages.blogs.show', $blog->slug) }}" class="btn btn-primary">Read more</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@include('partials.subscribe')
@endsection