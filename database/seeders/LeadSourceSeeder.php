<?php

namespace Database\Seeders;

use App\Models\LeadSource;
use Illuminate\Database\Seeder;

class LeadSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $possible_source = [
            'Blogging',
            'Premium Content',
            'Organic Search',
            'Email Marketing',
            'Digital Advertising',
            'Media Coverage',
            'Social Media',
            'Website',
            'Direct Marketing',
            'Traditional Advertising',
            'Sponsorships',
            'Affiliate / Partner Programs',
            'Events / Shows',
            'Inbound Phone Calls',
            'Outbound Sales',
            'Referrals',
            'Speaking Engagements',
            'Traditional / Offline Networking'
        ];

        foreach ($possible_source as $k => $source)
        {
           LeadSource::create([
                'title' => $source
            ]);
        }
    }
}
