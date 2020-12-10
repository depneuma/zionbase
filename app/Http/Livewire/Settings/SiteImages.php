<?php

namespace App\Http\Livewire\Settings;

use App\Models\Package;
use App\Models\Setting;
use Livewire\Component;
use App\Traits\FlashMessages;
use Livewire\WithFileUploads;

class SiteImages extends Component
{
    use FlashMessages;
    use WithFileUploads;

    public $site_favicon, $old_site_favicon;
    public $site_logo, $old_site_logo;
    public $site_slider, $old_site_slider;
    public $site_banner, $old_site_banner;
    public $site_guest_banner, $old_site_guest_banner;
    public $package_image, $package;

    protected $rules = [
        'site_favicon' => 'nullable|image|max:1024',
        'site_logo' => 'nullable|image|max:1024',
        'site_slider' => 'nullable|image|max:1024',
        'site_banner' => 'nullable|image|max:1024',
        'site_guest_banner' => 'nullable|image|max:1024',
        'package_image' => 'nullable|image|max:1024',
        'package' => 'required_with:package_image|string|max:7|min:7',
    ];

    public function mount()
    {
        $this->old_site_favicon = Setting::get('site_favicon');
        $this->old_site_logo = Setting::get('site_logo');
        $this->old_site_slider = Setting::get('site_slider');
        $this->old_site_banner = Setting::get('site_banner');
        $this->old_site_guest_banner = Setting::get('site_guest_banner');
    }

    public function render()
    {
        return view('livewire.settings.site-images');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        // $this->validate();
        if (!is_null($this->site_favicon)) {
            $filename = $this->site_favicon
                ->storeAs('img', 'site_favicon' . '.' . $this->site_favicon->extension());
            Setting::set('site_favicon', $filename);
        }

        if (!is_null($this->site_logo)) {
            $filename = $this->site_logo
                ->storeAs('img', 'site_logo' . '.' . $this->site_logo->extension());
            Setting::set('site_logo', $filename);
        }

        if (!is_null($this->site_slider)) {
            $filename = $this->site_slider
                ->storeAs('img', 'site_slider' . '.' . $this->site_slider->extension());
            Setting::set('site_slider', $filename);
        }

        if (!is_null($this->site_banner)) {
            $filename = $this->site_banner
                ->storeAs('img', 'site_banner' . '.' . $this->site_banner->extension());
            Setting::set('site_banner', $filename);
        }

        if (!is_null($this->site_guest_banner)) {
            $filename = $this->site_guest_banner
                ->storeAs('img', 'site_guest_banner' . '.' . $this->site_guest_banner->extension());
            Setting::set('site_guest_banner', $filename);
        }

        if (!is_null($this->package_image)) {
            $filename = $this->package_image
                ->storeAs('img', $this->package . '.' . $this->package_image->extension());
            $package = Package::where('code', $this->package)->first();
            $package->image = $filename;
            $package->save();
        }

        $this->setFlashMessage('Image uploaded successfully.', 'success');
        $this->showFlashMessages();
    }
}
