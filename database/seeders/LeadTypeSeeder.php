<?php

namespace Database\Seeders;

use App\Models\LeadType;
use Illuminate\Database\Seeder;

class LeadTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lead_type = array(
            'Lead',
            'Contact',
            'Deal',
        );
        LeadType::create(['']);
    }
}
