<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::factory(1)->create();

        $this->call([
            IndustrySeeder::class,
            JobSeeder::class
        ]);
    }
}
