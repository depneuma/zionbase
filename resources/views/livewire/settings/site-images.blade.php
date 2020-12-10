<div class="card">
    <div class="card-body">
        <p>
            {{ __('Change Site Images') }}
        </p>
        <div class="mt-3">
            <form>
                <div class="form-group row">

                    <div class="col-md-3 col-sm-6 m-b30">
                        <div class="wt-box bg-white p-a20 border-1">
                            <h4 class="wt-title m-t20">Site Favicon</h4>
                            <div class="wt-media">
                                @if ( $site_favicon )
                                <img src="{{ $site_favicon->temporaryUrl() }}" alt="">
                                @elseif( $old_site_favicon )
                                <img src="{{ asset('storage/'.config('settings.site_favicon')) }}" alt="">
                                @else
                                <img src="{{ asset('images/our-work/pic2.jpg') }}" alt="Site Logo">
                                @endif
                            </div>
                            <div class="wt-info">
                                <input wire:model="site_favicon" id="site_favicon" type="file" class="form-control"
                                    required> <br>
                                @error('site_favicon') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 m-b30">
                        <div class="wt-box bg-white p-a20 border-1">
                            <h4 class="wt-title m-t20">Site Logo</h4>
                            <div class="wt-media">
                                @if ( $site_logo )
                                <img src="{{ $site_logo->temporaryUrl() }}" alt="">
                                @elseif( $old_site_logo )
                                <img src="{{ asset('storage/'.config('settings.site_logo')) }}" alt="">
                                @else
                                <img src="{{ asset('images/our-work/pic2.jpg') }}" alt="Site Logo">
                                @endif
                            </div>
                            <div class="wt-info">
                                <input wire:model="site_logo" id="site_logo" type="file" class="form-control" required>
                                <br>
                                @error('site_logo') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 m-b30">
                        <div class="wt-box bg-white p-a20 border-1">
                            <h4 class="wt-title m-t20">Site Slider Image</h4>
                            <div class="wt-media">
                                @if ( $site_slider )
                                <img src="{{ $site_slider->temporaryUrl() }}" alt="">
                                @elseif( $old_site_slider )
                                <img src="{{ asset('storage/'.config('settings.site_slider')) }}" alt="">
                                @else
                                <img src="{{ asset('images/our-work/pic2.jpg') }}" alt="Site Banner">
                                @endif
                            </div>
                            <div class="wt-info">
                                <input wire:model="site_slider" id="site_slider" type="file" class="form-control" required>
                                <br>
                                @error('site_slider') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 m-b30">
                        <div class="wt-box bg-white p-a20 border-1">
                            <h4 class="wt-title m-t20">Site Guest Banner</h4>
                            <div class="wt-media">
                                @if ( $site_guest_banner )
                                <img src="{{ $site_guest_banner->temporaryUrl() }}" alt="">
                                @elseif( $old_site_guest_banner )
                                <img src="{{ asset('storage/'.config('settings.site_guest_banner')) }}" alt="">
                                @else
                                <img src="{{ asset('images/our-work/pic2.jpg') }}" alt="Site Guest Banner">
                                @endif
                            </div>
                            <div class="wt-info">
                                <input wire:model="site_guest_banner" id="site_guest_banner" type="file" class="form-control" required>
                                <br>
                                @error('site_guest_banner') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 m-b30">
                        <div class="wt-box bg-white p-a20 border-1">
                            <h4 class="wt-title m-t20">Site Banner</h4>
                            <div class="wt-media">
                                @if ( $site_banner )
                                <img src="{{ $site_banner->temporaryUrl() }}" alt="">
                                @elseif( $old_site_banner )
                                <img src="{{ asset('storage/'.config('settings.site_banner')) }}" alt="">
                                @else
                                <img src="{{ asset('images/our-work/pic2.jpg') }}" alt="Site Banner">
                                @endif
                            </div>
                            <div class="wt-info">
                                <input wire:model="site_banner" id="site_banner" type="file" class="form-control" required>
                                <br>
                                @error('site_banner') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 m-b30">
                        <div class="wt-box bg-white p-a20 border-1">
                            <h4 class="wt-title m-t20">Site Packages</h4>
                            <div class="wt-media">
                                @if ( $package_image )
                                <img src="{{ $package_image->temporaryUrl() }}" alt="">
                                @else
                                <img src="{{ asset('images/our-work/pic2.jpg') }}" alt="Package Image">
                                @endif
                            </div>
                            <div class="wt-info">
                                <input type="text" wire:model="package" class="form-control" placeholder="Package Code">
                                <input wire:model="package_image" id="package_image" type="file" class="form-control" required>
                                <br>
                                @error('package_image') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <a wire:click="save()" class="btn btn-primary btn-block">
                            {{ __('Update Images') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>