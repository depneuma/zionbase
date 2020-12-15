<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $settings = [ 
        /*
        |--------------------------------------------------------------------------
        | Basic Settings
        |--------------------------------------------------------------------------
        */
        [
            'key'                       =>  'church_name',
            'value'                     =>  'Shammah Divine Zion Ministry',
        ],
        [
            'key'                       =>  'church_description',
            'value'                     =>  'Transforming Lives In Zion Through The Power In The Word of God To Transform Generations.',
        ],
        [
            'key'                       =>  'church_address',
            'value'                     =>  'No. 36 Orierhe Street, Off Apala Road, Warri, Nigeria.',
        ],
        [
            'key'                       =>  'church_contact_number',
            'value'                     =>  '+234 813 289 7322',
        ],
        [
            'key'                       =>  'church_email',
            'value'                     =>  'zionbasemedia@gmail.com',
        ],
        [
            'key'                       =>  'domain_name',
            'value'                     =>  'ZionBase.org',
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  'Shammah Divine Zion Ministry',
        ],
        [
            'key'                       =>  'seo_meta_keywords',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  '',
        ],
        /*
        |--------------------------------------------------------------------------
        | Images Settings
        |--------------------------------------------------------------------------
        */
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_slider',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_banner',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_guest_banner',
            'value'                     =>  '',
        ],
        /*
        |--------------------------------------------------------------------------
        | Social Media Settings
        |--------------------------------------------------------------------------
        */
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_telegram',
            'value'                     =>  '',
        ],
        /*
        |--------------------------------------------------------------------------
        | Analytics Settings
        |--------------------------------------------------------------------------
        */
        [
            'key'                       =>  'google_analytics',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'facebook_pixels',
            'value'                     =>  '',
        ],
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->settings). ' records');
    }
}
