<section class="hero-wrap js-fullheight">
    <div class="home-slider js-fullheight owl-carousel">
        @foreach ($heros as $hero)
        <div class="slider-item js-fullheight" style="background-image:url({{ \Storage::url($hero->image) }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-8 ftco-animate">
                        <div class="text mt-md-5 w-100 text-center">
                            <h2>{{ $hero->line_one }}</h2>
                            <h1 class="mb-3">{{ $hero->line_two }}</h1>
                            <p class="mb-4 pb-3">{{ $hero->line_three }}</p>
                            <p class="mb-0"><a href="{{ route('pages.blogs') }}" class="btn btn-primary py-3 px-2 px-md-4">Read Your Life News</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>