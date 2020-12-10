@extends('layouts.app')

@section('content')
<!-- SECTION CONTENT -->
<div class="section-full  p-t80 p-b80">
    <div class="container">
        <!-- TITLE START-->
        <div class="section-head text-center">
            <h2 class="text-uppercase">{{ $subTitle }}</h2>
            <div class="wt-separator-outer">
                <div class="wt-separator bg-primary"></div>
            </div>
        </div>

        <div class="border-top border bg-tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab"
                        data-toggle="tab">Basic Settings</a></li>
                <li role="presentation"><a href="#images" aria-controls="images" role="tab"
                        data-toggle="tab">Images Updates</a></li>
                <li role="presentation"><a href="#social" aria-controls="social" role="tab"
                        data-toggle="tab">Social Links</a>
                </li>
                <li role="presentation"><a href="#analytics" aria-controls="analytics" role="tab"
                        data-toggle="tab">SEO Analytics</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="m-b100 tab-content nav-justified">
                
                <div role="tabpanel" class="tab-pane fade in active" id="basic">
                    @livewire('settings.general')
                </div>

                <div role="tabpanel" class="tab-pane fade" id="images">
                    @livewire('settings.site-images')
                </div>

                <div role="tabpanel" class="tab-pane fade" id="social">
                    @livewire('settings.site-links')
                </div>

                <div role="tabpanel" class="tab-pane fade" id="analytics">
                    Analytics
                </div>
            </div>

        </div>
    </div>
</div>
<!-- SECTION CONTENT END -->
@endsection