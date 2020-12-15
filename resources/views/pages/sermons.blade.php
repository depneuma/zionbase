@extends('layouts.master')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters d-flex sermon-wrap ftco-animate bg-light">
            <div class="col-md-6 d-flex align-items-stretch js-fullheight ftco-animate">
                <a href="#" class="img" style="background-image: url({{ asset('images/sermon-1.jpg') }});"></a>
            </div>
            <div class="col-md-6 py-4 py-md-5 ftco-animate d-flex align-items-center">
                <div class="text p-md-5">
                    <h2 class="mb-4"><a href="sermon.html">God Wants To Do A New Thing In Your Life</a></h2>
                    <div class="meta">
                        <p>
                            <span>Speaker: <a href="#" class="ptr">Dr. Rolando Henderson</a></span>
                            <span>Categories: <a href="#">God</a>, <a href="#">Pray</a>, <a href="#">Faith</a></span>
                            <span><a href="#">On Sunday 13 Jan, 2019</a></span>
                        </p>
                    </div>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth. Separated
                        they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <p class="mt-4 btn-customize">
                        <a href="https://vimeo.com/45830194" class="btn btn-primary px-4 py-3 mr-md-2 popup-vimeo"><span
                                class="fa fa-play"></span> Watch Video</a> <a href="#"
                            class="btn btn-primary btn-outline-primary px-4 py-3 ml-lg-2"><span
                                class="fa fa-download"></span> Download MP3 Audio</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row no-gutters d-flex sermon-wrap ftco-animate bg-light">
            <div class="col-md-6 d-flex align-items-stretch js-fullheight ftco-animate order-md-last">
                <a href="#" class="img" style="background-image: url({{ asset('images/sermon-2.jpg') }});"></a>
            </div>
            <div class="col-md-6 py-4 py-md-5 ftco-animate d-flex align-items-center">
                <div class="text p-md-5">
                    <h2 class="mb-4"><a href="sermon.html">God Wants To Do A New another Thing In Your Life</a></h2>
                    <div class="meta">
                        <p>
                            <span>Speaker: <a href="#" class="ptr">Dr. Rolando Henderson</a></span>
                            <span>Categories: <a href="#">God</a>, <a href="#">Pray</a>, <a href="#">Faith</a></span>
                            <span><a href="#">On Sunday 13 Jan, 2019</a></span>
                        </p>
                    </div>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth. Separated
                        they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <p class="mt-4 btn-customize">
                        <a href="https://vimeo.com/45830194" class="btn btn-primary px-4 py-3 mr-md-2 popup-vimeo"><span
                                class="fa fa-play"></span> Watch Sermons</a> <a href="#"
                            class="btn btn-primary btn-outline-primary px-4 py-3 ml-lg-2"><span
                                class="fa fa-download"></span> Download Sermons</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection