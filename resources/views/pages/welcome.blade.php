@extends('layouts.master')

@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0"
                    style="background-image:url(images/about-3.jpg);">
                </div>
            </div>
            <div class="col-md-6 pl-md-5 py-md-5">
                <div class="heading-section pt-md-5 mb-4">
                <span class="subheading">Welcome to {{ config('settings.seo_meta_title') }}</span>
                    <h2 class="mb-5">Connect, Grow and Serve with Us</h2>
                    <p>Shammah Divine Zion Ministry Int’l is a Zion church (WHITE GARMENT CHURCH) with a mandate to keep the legacy of its roots (Garment) but to transform and redefine the totality of the ZION MISSION to conform to the new generation; to break all generational barriers and to change perceptions that the Christian world have about the white garment churches.</p>
                    <p><a href="#" class="btn btn-primary">Learn More</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Events</span>
                <h2>Upcoming Event</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 event-wrap d-md-flex ftco-animate">
                <div class="img" style="background-image: url(images/event-1.jpg);"></div>
                <div class="text p-4 px-md-5 d-flex align-items-center">
                    <div class="desc">
                        <h2 class="mb-4"><a href="#">Giving Hope to Our Spiritual Needs</a></h2>
                        <div class="meta">
                            <p>
                                <span><i class="fa fa-calendar mr-2"></i> Monday, 8:00 Am - Tuesday, 8:00
                                    Pm</span>
                                <span><i class="fa fa-map-marker mr-2"></i> <a href="#">Salvation
                                        Church</a></span>
                                <span><i class="fa fa-building mr-2"></i> 203 Fake St. Mountain View, San
                                    Francisco, California, USA</span>
                            </p>
                        </div>
                        <p><a href="{{ route('pages.events') }}" class="btn btn-primary">More Events</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Our Blog</span>
                <h2>From Your Life News</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
                    </a>
                    <div class="text p-4">
                        <div class="meta mb-2">
                            <div><a href="#">July 20, 2020</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                        </div>
                        <h3 class="heading"><a href="#">Building Holy &amp; Healthy Lives God’s</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and
                            Consonantia</p>
                        <p><a href="#" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
                    </a>
                    <div class="text p-4">
                        <div class="meta mb-2">
                            <div><a href="#">July 20, 2020</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                        </div>
                        <h3 class="heading"><a href="#">Building Holy &amp; Healthy Lives God’s</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and
                            Consonantia</p>
                        <p><a href="#" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
                    </a>
                    <div class="text p-4">
                        <div class="meta mb-2">
                            <div><a href="#">July 20, 2020</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                        </div>
                        <h3 class="heading"><a href="#">Building Holy &amp; Healthy Lives God’s</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and
                            Consonantia</p>
                        <p><a href="#" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection