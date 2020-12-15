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
                                <h4>Worhip</h4>
                                <span class="subheading">What to expect</span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-2">
                            <div class="icon"><span class="flaticon-pray"></span></div>
                            <div class="text">
                                <h4>Connect</h4>
                                <span class="subheading">Contact Members</span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="services-2">
                            <div class="icon"><span class="flaticon-love"></span></div>
                            <div class="text">
                                <h4>God's Love</h4>
                                <span class="subheading">Beliefs and History</span>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="services-2 services-block">
                    <div class="text">
                        <h4>A Christian should live for the glory of God and the well-being of others.</h4>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
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
                <span class="subheading">Leaders</span>
                <h2>Our Leadership Team</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="staff">
                    <div class="img" style="background-image: url({{ asset('images/staff-1.jpg') }});"></div>
                    <div class="text text-1">
                        <h3>Alex Martin</h3>
                        <span>Bible Pastor</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="ftco-section ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Gallery</span>
                <h2>Galleries</h2>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-3">
                <a href="images/gallery-1.jpg" class="image-popup img gallery ftco-animate"
                    style="background-image: url(images/gallery-1.jpg);">
                    <span class="overlay"></span>
                </a>
            </div>
            <div class="col-md-3">
                <a href="images/gallery-2.jpg" class="image-popup img gallery ftco-animate"
                    style="background-image: url(images/gallery-2.jpg);">
                    <span class="overlay"></span>
                </a>
            </div>
            <div class="col-md-3">
                <a href="images/gallery-3.jpg" class="image-popup img gallery ftco-animate"
                    style="background-image: url(images/gallery-3.jpg);">
                    <span class="overlay"></span>
                </a>
            </div>
            <div class="col-md-3">
                <a href="images/gallery-4.jpg" class="image-popup img gallery ftco-animate"
                    style="background-image: url(images/gallery-4.jpg);">
                    <span class="overlay"></span>
                </a>
            </div>
            <div class="col-md-6">
                <a href="images/gallery-5.jpg" class="image-popup img gallery ftco-animate"
                    style="background-image: url(images/gallery-5.jpg);">
                    <span class="overlay"></span>
                </a>
            </div>
            <div class="col-md-3">
                <a href="images/gallery-6.jpg" class="image-popup img gallery ftco-animate"
                    style="background-image: url(images/gallery-6.jpg);">
                    <span class="overlay"></span>
                </a>
            </div>
            <div class="col-md-3">
                <a href="images/gallery-7.jpg" class="image-popup img gallery ftco-animate"
                    style="background-image: url(images/gallery-7.jpg);">
                    <span class="overlay"></span>
                </a>
            </div>
        </div>
    </div>
</section> --}}

@endsection