@extends('layouts.master')

@section('content')
<section class="ftco-section">
    @include('partials.subscribe')
    <div class="container">
        <div class="row d-flex">
            @forelse ($blogs as $blog)
            <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url({{ \Storage::url($blog->image) }});">
                    </a>
                    <div class="text p-4">
                        <div class="meta mb-2">
                            <div><a href="#">{{ $blog->created_at->format('F jS, Y') }}</a></div>
                            <div><a href="#">{{ $blog->author->nickname }}</a></div>
                            <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> [3]</a></div>
                        </div>
                        <h3 class="heading"><a href="#">{{ $blog->title }}</a></h3>
                        <p>{{ Str::words($blog->body, 25) }}</p>
                        <p><a href="{{ route('pages.blogs.show', $blog->slug) }}" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
            </div>
            @empty 
            <div class="text-center">
                <h2>There Are No Articles At This Time</h2>
                <p>Please subscribe, and we will keep you updated.</p>
            </div>
            @endforelse
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li class="">{!! $blogs->render() !!}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.subscribe')
@endsection