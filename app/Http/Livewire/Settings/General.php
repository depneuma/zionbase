<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;
use App\Traits\FlashMessages;

class General extends Component
{    
    use FlashMessages;

    public $site_title, $site_name, $seo_meta_title, $seo_meta_description, $seo_meta_keywords, $footer_copyright_text;

    public function mount()
    {
        $this->site_name = Setting::get('site_name');
        $this->site_title = Setting::get('site_title');
        $this->seo_meta_title = Setting::get('seo_meta_title');
        $this->seo_meta_description = Setting::get('seo_meta_description');
        $this->seo_meta_keywords = Setting::get('seo_meta_keywords');
        $this->footer_copyright_text = Setting::get('footer_copyright_text');
    }
    
    public function render()
    {
        return view('livewire.settings.general');
    }

    public function update()
    {
        Setting::set('site_name', $this->site_name);
        Setting::set('site_title', $this->site_title);
        Setting::set('seo_meta_title', $this->seo_meta_title);
        Setting::set('seo_meta_description', $this->seo_meta_description);
        Setting::set('seo_meta_keywords', $this->seo_meta_keywords);
        Setting::set('footer_copyright_text', $this->footer_copyright_text);

        // $this->emit('swal:modal', [
        //     'type'  => 'success',
        //     'title' => 'Success!!',
        //     'text'  => "Settings updated successfully",
        // ]);
        // $this->emit('swal:alert', [
        //     'type'    => 'success',
        //     'title'   => 'Settings updated successfully', 
        //     'timeout' => 10000
        // ]);
        $this->setFlashMessage('Settings updated successfully.', 'success');
        $this->showFlashMessages();
    }
}
