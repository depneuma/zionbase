<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <p class="mb-0 location">
                    <span class="fa fa-map-marker mr-2"></span> {{config('settings.church_address')}}
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="{{ config('settings.social_facebook') }}" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="{{ config('settings.social_twitter') }}" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="{{ config('settings.social_instagram') }}" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('pages.welcome') }}"><img src="{{ \Storage::url(config('settings.site_logo')) }}" alt="{{ config('settings.church_name') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Route::currentRouteName() == 'pages.welcome' ? 'active' : '' }}"><a href="{{ route('pages.welcome') }}" class="nav-link">Home</a></li>
                <li class="nav-item {{ Route::currentRouteName() == 'pages.about' ? 'active' : '' }}"><a href="{{ route('pages.about') }}" class="nav-link">About</a></li>
                <li class="nav-item {{ Route::currentRouteName() == 'pages.sermons' ? 'active' : '' }}"><a href="{{ route('pages.sermons') }}" class="nav-link">Sermons</a></li>
                <li class="nav-item {{ Route::currentRouteName() == 'pages.events' ? 'active' : '' }}"><a href="{{ route('pages.events') }}" class="nav-link">Events</a></li>
                <li class="nav-item {{ Route::currentRouteName() == 'pages.blogs' ? 'active' : '' }}"><a href="{{ route('pages.blogs') }}" class="nav-link">Blog</a></li>
                <li class="nav-item {{ Route::currentRouteName() == 'pages.contact' ? 'active' : '' }}"><a href="{{ route('pages.contact') }}" class="nav-link">Contact</a></li>
                {{-- <li class="nav-item cta"><a href="contact.html" class="nav-link">Donate</a></li> --}}
            </ul>
        </div>
    </div>
</nav>