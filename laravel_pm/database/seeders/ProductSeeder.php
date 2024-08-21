<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'name' => $faker->name,
                'qty' => $faker->numberBetween(1, 100)
            ]);
        }
    }
}
