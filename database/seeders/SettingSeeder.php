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
            'value'                     =>  'KryptoShares.io',
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  'KryptoShares Investment',
        ],
        [
            'key'                       =>  'seo_meta_keywords',
            'value'                     =>  'kryptoshares, invest in bitcoin, invest in cryptocurrency, cryptocurrency,bitcoin, litecoin, ethereum, stella lumens, ripple, investment',
        ],
        [
            'key'                       =>  'seo_meta_description',
            'value'                     =>  'KryptoShares.io allows you to invest once, and earn dividends for life, in your preferred cryptocurrency.',
        ],
        [
            'key'                       =>  'default_email_address',
            'value'                     =>  'kryptoshares@gmail.com',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  '',
        ],
        /*
        |--------------------------------------------------------------------------
        | Payment Settings
        |--------------------------------------------------------------------------
        */
        [
            'key'                       =>  'investment_amount',
            'value'                     =>  0.05,
        ],
        [
            'key'                       =>  'total_payouts',
            'value'                     =>  10,
        ],
        [
            'key'                       =>  'total_payout_cycle',
            'value'                     =>  14,
        ],
        [
            'key'                       =>  'slot_multiple',
            'value'                     =>  2,
        ],
        [
            'key'                       =>  'default_ratio',
            'value'                     =>  25,
        ],
        [
            'key'                       =>  'payment_cycle',
            'value'                     =>  30,
        ],
        [
            'key'                       =>  'default_currency', // personal
            'value'                     =>  'XLM',
        ],
        [
            'key'                       =>  'default_source_currency', // to charge all payments
            'value'                     =>  'USD',
        ],
        [
            'key'                       =>  'default_settlement_currency', // to receive all payments
            'value'                     =>  'XLM',
        ],
        [
            'key'                       =>  'default_address',
            'value'                     =>  'GBIUI2UEDJNY7QPRLJSEHHAKHXMR4SMHLVOZPKVSLQZNTBOZ4WQPWQIS',
        ],
        [
            'key'                       =>  'default_bank',
            'value'                     =>  'GTBank',
        ],
        [
            'key'                       =>  'default_acc_number',
            'value'                     =>  '0140007166',
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
