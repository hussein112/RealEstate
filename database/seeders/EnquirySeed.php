<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnquirySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enquiry::factory()->count(50)->create();
    }
}
