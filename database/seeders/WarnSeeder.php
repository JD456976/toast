<?php

namespace Database\Seeders;

use App\Models\Warn;
use Illuminate\Database\Seeder;

class WarnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Warn::factory()->count(5)->create();
    }
}
