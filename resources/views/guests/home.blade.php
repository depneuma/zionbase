@extends('layouts.app')

@section('content')
<!-- HOW IT WORK SECTION START  -->
<div class="section-full  p-t80 p-b80 bg-gray">
    <div class="container">
        <!-- TITLE START-->
        <div class="section-head text-center">
            <span class="wt-title-subline font-16 text-gray-dark m-b15">{{ __('Three-Step Investment') }}</span>
            <h2 class="text-uppercase">{{ __('How It Works') }}</h2>
            <div class="wt-separator-outer">
                <div class="wt-separator bg-primary"></div>
            </div>
        </div>
        <!-- TITLE END-->
        <div class="section-content no-col-gap">
            <div class="row">

                <!-- COLUMNS 1 -->
                <div class="col-md-4 col-sm-4 step-number-block">
                    <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                        <div class="icon-lg text-primary m-b20">
                            <a href="#" class="icon-cell"><img src="{{ asset('images/icon/pick-19.png') }}" alt=""></a>
                        </div>
                        <div class="icon-content">
                            <div class="step-number">1</div>
                            <h4 class="wt-tilte text-uppercase font-weight-500">Make Investment</h4>
                            <p>Invest 50 USD in any one or more of your preferred cryptocurrency packages. We have packages for <br> BTC, ETH, LTC, XRP & XLM.</p>
                        </div>
                    </div>
                </div>
                <!-- COLUMNS 2 -->
                <div class="col-md-4 col-sm-4 step-number-block">
                    <div class="wt-icon-box-wraper  p-a30 center bg-secondry m-a5 ">
                        <div class="icon-lg m-b20">
                            <a href="#" class="icon-cell"><img src="{{ asset('images/icon/pick-38.png') }}" alt=""></a>
                        </div>
                        <div class="icon-content text-white">
                            <div class="step-number active">2</div>
                            <h4 class="wt-tilte text-uppercase font-weight-500">Enjoy Dividends</h4>
                            <p>All dividends are paid to the crypto address associated with each investment and in the selected cryptocurrency.</p>
                        </div>
                    </div>
                </div>
                <!-- COLUMNS 3 -->
                <div class="col-md-4 col-sm-4 step-number-block">
                    <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                        <div class="icon-lg text-primary m-b20">
                            <a href="#" class="icon-cell"><img src="{{ asset('images/icon/pick-21.png') }}" alt=""></a>
                        </div>
                        <div class="icon-content">
                            <div class="step-number">3</div>
                            <h4 class="wt-tilte text-uppercase font-weight-500">Earn Bonuses</h4>
                            <p>We also have a referral program that allows you to earn an additional 25% Referral Bonus on all referral investments for life. It is optional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 step-number-block">
                    <div class="wt-icon-box-wraper p-a30 center m-a5">
                        <a href="{{ route('faq') }}" class="site-button outline button-lg gray btn-block m-r15 radius-xl" type="button">FREQUENTLY ASKED QUESTIONS</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- HOW IT WORK  SECTION END -->

<!-- INVESTMENT PACKAGES -->
<div class="section-full  p-t80 p-b80 bg-gray" id="register">
    <div class="container">
        <!-- TITLE START-->
        <div class="section-head text-center">
            <span class="wt-title-subline font-16 text-gray-dark m-b15">{{ config('app.name') }}</span>
            <h2 class="text-uppercase">Investment Packages</h2>
            <div class="wt-separator-outer">
                <div class="wt-separator bg-primary"></div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga eos optio ducimus odit,
                labore hic fugiat iusto veniam necessitatibus quas doloremque sapiente maiores.</p>
        </div>
        <!-- TITLE END-->

    </div>
</div>
<!-- INVESTMENT PACKAGES -->
@endsection