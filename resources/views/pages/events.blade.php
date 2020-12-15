@extends('layouts.master')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 event-wrap d-md-flex ftco-animate">
                <div class="img" style="background-image: url({{ asset('images/event-1.jpg') }});"></div>
                <div class="text p-4 px-md-5 d-flex align-items-center">
                    <div class="desc">
                        <h2 class="mb-4"><a href="sermons.html">Giving Hope to Our Spiritual Needs</a></h2>
                        <div class="meta">
                            <p>
                                <span><i class="fa fa-calendar mr-2"></i> Monday, 8:00 Am - Tuesday, 8:00 Pm</span>
                                <span><i class="fa fa-map-marker mr-2"></i> <a href="#">Salvation Church</a></span>
                                <span><i class="fa fa-building mr-2"></i> 203 Fake St. Mountain View, San Francisco,
                                    California, USA</span>
                            </p>
                        </div>
                        <p><a href="sermons.html" class="btn btn-primary">Subscribe For Reminders</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection