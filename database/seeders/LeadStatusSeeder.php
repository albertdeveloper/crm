<?php

namespace Database\Seeders;

use App\Models\LeadStatus;
use Illuminate\Database\Seeder;

class LeadStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array(
            'Attempted to Contact',
            'Contact in Future',
            'Contacted',
            'Junk Lead',
            'Lost Lead'
        );

        foreach($status as $stat)
        {
            LeadStatus::create(['title'=>$stat]);
        }

    }
}
