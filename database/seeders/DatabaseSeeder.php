<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PermissionsSeeder::class,
            AnnouncementSeeder::class,
            DealSeeder::class,
            PageSeeder::class,
            ProductCategorySeeder::class,
            ReportSeeder::class,
            StoreCategorySeeder::class,
            StoreSeeder::class,
            UserSeeder::class,
            WarnSeeder::class,
        ]);
    }
}
