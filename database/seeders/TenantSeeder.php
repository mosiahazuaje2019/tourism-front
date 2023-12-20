<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $length = 12;
        $faker  = Faker::create();
        $pass   = Str::random($length);
        User::create([
            'name'            => 'Admin',
            'email'           => $faker->unique()->email,
            'remember_token'  => $pass,
            'password'        => Hash::make($pass),
        ]);

    }
}
