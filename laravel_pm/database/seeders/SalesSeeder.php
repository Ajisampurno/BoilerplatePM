<?php

namespace Database\Seeders;

use App\Models\Sales;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            Sales::create([
                'sales_date' => $faker->date(),
                'product_id' => $faker->numberBetween(1, 5),
                'sales_amount' => $faker->numberBetween(1000, 100000),
                'salesperson_id' => $faker->numberBetween(1, 5)
            ]);
        }
    }
}
