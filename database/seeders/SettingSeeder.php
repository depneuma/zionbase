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
            'key'                       =>  'pastor_title',
            'value'                     =>  'Senior Pastor',
        ],
        [
            'key'                       =>  'church_mission',
            'value'                     =>  'Transforming Lives In Zion Through The Power In The Word of God To Transform Generations.',
        ],
        [
            'key'                       =>  'church_vision',
            'value'                     =>  'This Vision is FOCUSED ON THE YOUTH. This is because the youths are the future leaders and are the MAJOR TOOLS that God can use through us to bring this great VISION to full REALITY. Hence, in this ministry, we give full and intentional attention to the growth and development of the youths because of the DESIRED FUTURE OF THE VISION.',
        ],
        [
            'key'                       =>  'church_values',
            'value'                     =>  '1. Strong Reverence For The Word of God 2. Our Legacy (Garment) 3. Excellence In Ministry 4. Love 5. Discipline In Ministry',
        ],
        [
            'key'                       =>  'church_logo',
            'value'                     =>  'This logo is a representation of what God gave to me in a revelation that was shown to me. The scriptures were open in Red fonts and a dove descended on it and POWER came out from it. This gave birth to our BRAND STATEMENT ”POWER IN THE WORD”',
        ],
        [
            'key'                       =>  'church_description',
            'value'                     =>  'Shammah Divine Zion Ministry Int’l is a Zion church (WHITE GARMENT CHURCH) with a mandate to keep the legacy of its roots (Garment) but to transform and redefine the totality of the ZION MISSION to conform to the new generation; to break all generational barriers and to change perceptions that the Christian world have about the white garment churches.',
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
            'key'                       =>  'church_founder',
            'value'                     =>  'Senior Pastor S.O. Andafa is the Founder and Lead Pastor of Shammah Divine Zion Ministry Int’l. He is a passionate teacher of the word of God from His wealth of experiences. He is on a mission to bring transformation and reformation in the white garment churches for the next generation.',
        ],
        [
            'key'                       =>  'service_schedule',
            'value'                     =>  'Sundays | 8:00am - 10:00am, Wednesdays | 5:00pm - 6:30pm, Fridays | 5:00pm - 6:00pm',
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
            'key'                       =>  'site_favicon',
            'value'                     =>  'public/favicon.png',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  'public/logo.png',
        ],
        [
            'key'                       =>  'full_logo',
            'value'                     =>  'public/full-logo.png',
        ],
        [
            'key'                       =>  'church_about',
            'value'                     =>  'public/default.jpg',
        ],
        [
            'key'                       =>  'pages_about',
            'value'                     =>  'public/default.jpg',
        ],
        [
            'key'                       =>  'pages_events',
            'value'                     =>  'public/default.jpg',
        ],
        [
            'key'                       =>  'pages_blogs',
            'value'                     =>  'public/default.jpg',
        ],
        [
            'key'                       =>  'pages_blogs_single',
            'value'                     =>  'public/default.jpg',
        ],
        [
            'key'                       =>  'pages_contact',
            'value'                     =>  'public/default.jpg',
        ],
        [
            'key'                       =>  'pages_sermons',
            'value'                     =>  'public/default.jpg',
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
