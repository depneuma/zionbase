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
            'key'                       =>  'domain_name',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  '',
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
            'key'                       =>  'default_email_address',
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
