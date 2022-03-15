<?php

namespace Database\Seeders;

use App\Models\Bounty;
use Illuminate\Database\Seeder;

class BountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Bounty::factory()->count(5)->create();
    }
}
