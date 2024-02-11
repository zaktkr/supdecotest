<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@pubIshhar.rim',
            'password' => bcrypt('12341234'),
            'email_verified_at' => now(),
            'user_img' => '',
            'slug' => '',
            'type' => 1,
            'status' => 1,
            'remember_token' => Str::random(10)
        ]);

        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => $faker->Name,
                'email' => $faker->email,
                'password' => bcrypt('12341234'),
                'email_verified_at' => now(),
                'user_img' => '',
                'slug' => '',
                'type' => 0,
                'status' => 1,
                'remember_token' => Str::random(10)
            ]);
        }
    }
}
