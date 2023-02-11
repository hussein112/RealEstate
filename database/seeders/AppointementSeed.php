<?php

namespace Database\Seeders;

use App\Models\Appointement;
use Illuminate\Database\Seeder;

class AppointementSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appointement::factory()->count(20)->create();
    }
}
