<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                <h2 class="footer-heading">{{ config('settings.church_name') }}</h2>
                <p>{{ config('settings.church_mission') }}
                </p>
                <ul class="ftco-footer-social p-0">
                    <li class="ftco-animate"><a href="{{ config('settings.social_twitter') }}" data-toggle="tooltip" data-placement="top"
                            title="Twitter"><span class="fa fa-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="{{ config('settings.social_facebook') }}" data-toggle="tooltip" data-placement="top"
                            title="Facebook"><span class="fa fa-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="{{ config('settings.social_instagram') }}" data-toggle="tooltip" data-placement="top"
                            title="Instagram"><span class="fa fa-instagram"></span></a></li>
                </ul>
                <p class="">OFFICIAL USE ONLY</p>
                <ul class="list-unstyled">
                    <li><a href="{{ route('login') }}" class="py-2 d-block">Admin Login</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                <h2 class="footer-heading">Service Schedule</h2>
                <div class="block-23 mb-3">
                    <ul>
                        <li><a href="#"><span class="icon fa fa-paper-plane"></span>
                            <span class="text">{!! nl2br(e(config('settings.service_schedule') )) !!}</span></a></li>
                        <li><span class="icon fa fa-map"></span><span class="text">{{ config('settings.church_address') }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                <h2 class="footer-heading">Quick Links</h2>
                <ul class="list-unstyled">
                    <li><a href="{{ route('pages.welcome') }}" class="py-2 d-block">Home</a></li>
                    <li><a href="{{ route('pages.about') }}" class="py-2 d-block">About</a></li>
                    <li><a href="{{ route('pages.sermons') }}" class="py-2 d-block">Sermons</a></li>
                    <li><a href="{{ route('pages.events') }}" class="py-2 d-block">Events</a></li>
                    <li><a href="{{ route('pages.blogs') }}" class="py-2 d-block">Blog</a></li>
                    <li><a href="{{ route('pages.contact') }}" class="py-2 d-block">Contact</a></li>
                </ul>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                <h2 class="footer-heading">Life News Articles</h2>
                @livewire('footer-articles')
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p class="copyright">
                    Copyrights &copy; {{ date('Y').' '.config('settings.church_name') }}, All Rights Reserved. 
                </p>
            </div>
        </div>
    </div>
</footer>