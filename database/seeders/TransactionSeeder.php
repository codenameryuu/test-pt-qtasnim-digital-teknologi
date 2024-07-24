<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        $product = Product::all()->pluck('id');

        $data = [
            'product_id' => $faker->randomElement($product),
            'quantity' => $faker->numberBetween(1, 10),
        ];

        Transaction::create($data);
    }
}
