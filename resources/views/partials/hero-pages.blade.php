@switch(Route::currentRouteName())
    @case('pages.about')
        <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ \Storage::url(config('settings.pages_about')) }});">
        @break
    @case('pages.sermons')
        <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ \Storage::url(config('settings.pages_sermons')) }});">
        @break 
    @case('pages.events')
        <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ \Storage::url(config('settings.pages_events')) }});">
        @break   
    @case('pages.blogs')
        <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ \Storage::url(config('settings.pages_blogs')) }});">
        @break    
    @case('pages.blogs.show')
        <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ \Storage::url($blog->image) }});">
        @break    
    @case('pages.contact')
        <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ \Storage::url(config('settings.pages_contact')) }});">
        @break         
@endswitch
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                @switch( Route::currentRouteName() )
                    @case('pages.blogs.show')
                    <p class="breadcrumbs mb-2">
                        <span class="mr-2">
                            <a href="{{ route('pages.welcome') }}">{{ __('Home') }} <i class="fa fa-chevron-right"></i></a>
                        </span> 
                        <span class="mr-2">
                            <a href="{{ route('pages.blogs') }}">{{ __('Blog') }} <i class="fa fa-chevron-right"></i></a>
                        </span>
                        <span>{{ $pageTitle }} <i class="fa fa-chevron-right"></i></span>
                    </p>
                     @break

                @default
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('pages.welcome') }}">{{ __('Home') }} <i
                                class="fa fa-chevron-right"></i></a></span> <span>{{ $pageTitle }} <i
                            class="fa fa-chevron-right"></i></span></p>
                    @break
                @endswitch
                <h1 class="mb-0 bread">{{ $subTitle }}</h1>
            </div>
        </div>
    </div>
</section>