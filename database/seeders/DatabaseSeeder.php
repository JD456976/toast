<?php

namespace Database\Seeders;

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
            LaratrustSeeder::class,
            AnnouncementSeeder::class,
            DealSeeder::class,
            PageSeeder::class,
            ProductCategorySeeder::class,
            ReportSeeder::class,
            StoreCategorySeeder::class,
            StoreSeeder::class,
            WarnSeeder::class,
            RoleUserSeeder::class,
            WatchlistSeeder::class,
            CommentSeeder::class,
            BountySeeder::class,
            PostCategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
