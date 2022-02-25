<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jason Craig',
            'email' => 'craig219@comcast.net',
            'password' => Hash::make('UPsidedown666!'),
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        User::factory()->count(10)->create();
    }
}
