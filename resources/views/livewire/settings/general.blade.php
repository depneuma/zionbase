<div class="card mb-4">
    <div class="card-header">
        {{ __('General Settings') }}
    </div>
    <div class="card-body">
        <p>
            {{ __('Update general site settings') }}
        </p>
        <div class="mt-3">
            <form>
                <div class="form-group row">
                    <label for="site_title" class="col-md-4 col-form-label text-md-right">{{ __('Site Title') }}</label>
                    <div class="col-md-6">
                        <input wire:model.defer="site_title" wire:dirty.class="has-error" type="text"
                            class="form-control @error('site_title') is-invalid @enderror" name="site_title"
                            placeholder="{{ $site_title }}" value="{{ old('site_title') }}" required
                            autocomplete="site_title">
                        @error('site_title')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="site_name" class="col-md-4 col-form-label text-md-right">{{ __('Site Name') }}</label>
                    <div class="col-md-6">
                        <input wire:model.defer="site_name" wire:dirty.class="has-error" type="text"
                            class="form-control @error('site_name') is-invalid @enderror" name="site_name"
                            placeholder="{{ $site_name }}" value="{{ old('site_name') }}" required
                            autocomplete="site_name">
                        @error('site_name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="seo_meta_title"
                        class="col-md-4 col-form-label text-md-right">{{ __('SEO Meta Title') }}</label>
                    <div class="col-md-6">
                        <input wire:model.defer="seo_meta_title" wire:dirty.class="has-error" type="text"
                            class="form-control @error('seo_meta_title') is-invalid @enderror" name="seo_meta_title"
                            placeholder="{{ $seo_meta_title }}" value="{{ old('seo_meta_title') }}" required
                            autocomplete="seo_meta_title">
                        @error('seo_meta_title')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="seo_meta_description"
                        class="col-md-4 col-form-label text-md-right">{{ __('SEO Meta Description') }}</label>
                    <div class="col-md-6">
                        <textarea name="seo_meta_description" id="seo_meta_description" cols="30" rows="3"
                            wire:model.defer="seo_meta_description" wire:dirty.class="has-error"
                            class="form-control @error('seo_meta_description') is-invalid @enderror"
                            value="{{ old('seo_meta_description') }}" required autocomplete="seo_meta_description">
                        </textarea>
                        @error('seo_meta_description')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="seo_meta_keywords"
                        class="col-md-4 col-form-label text-md-right">{{ __('SEO Meta Keywords') }}</label>
                    <div class="col-md-6">
                        <textarea name="seo_meta_keywords" id="seo_meta_keywords" cols="30" rows="3"
                            wire:model.defer="seo_meta_keywords" wire:dirty.class="has-error"
                            class="form-control @error('seo_meta_keywords') is-invalid @enderror"
                            value="{{ old('seo_meta_keywords') }}" required autocomplete="seo_meta_keywords">
                        </textarea>
                        @error('seo_meta_keywords')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="footer_copyright_text"
                        class="col-md-4 col-form-label text-md-right">{{ __('Footer Copyright Text') }}</label>
                    <div class="col-md-6">
                        <input wire:model.defer="footer_copyright_text" wire:dirty.class="has-error" type="text"
                            class="form-control @error('footer_copyright_text') is-invalid @enderror"
                            name="footer_copyright_text" placeholder="{{ $footer_copyright_text }}"
                            value="{{ old('footer_copyright_text') }}" required autocomplete="footer_copyright_text">
                        @error('footer_copyright_text')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button wire:click="update" class="btn btn-primary">
                            {{ __('Update Settings') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>