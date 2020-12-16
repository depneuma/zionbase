@extends('layouts.master')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach ($events as $event)
            <div class="col-md-12 event-wrap d-md-flex ftco-animate">
                <div class="img"
                    style="background-image: url({{ \Storage::url($event->cover) }});">
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
                                    {{ $event->firstRsvp->nickname.', '.$event->firstRsvp->mobile }}</span>
                                @if ($event->secondRsvp)
                                    <span> RSVP:
                                    {{ $event->secondRsvp->nickname.', '.$event->secondRsvp->mobile }}</span>
                                @endif
                            </p>
                        </div>
                        <p><a href="#" class="btn btn-primary">Subscribe For Reminders</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li class="">{!! $events->render() !!}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection