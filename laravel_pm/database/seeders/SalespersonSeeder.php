<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Salesperson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalespersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 3; $i++) {
            Salesperson::create([
                'name' => $faker->name
            ]);
        }
    }
}
