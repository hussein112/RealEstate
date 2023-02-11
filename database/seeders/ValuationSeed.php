<?php

namespace Database\Seeders;

use App\Models\Valuation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValuationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Valuation::factory()->count(100)->create();
    }
}
