<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        $data = [
            'product_category_id' => 1,
            'name' => 'Kopi',
            'stock' => 100,
        ];

        Product::create($data);

        $data = [
            'product_category_id' => 1,
            'name' => 'Teh',
            'stock' => 100,
        ];

        Product::create($data);

        $data = [
            'product_category_id' => 2,
            'name' => 'Pasta Gigi',
            'stock' => 100,
        ];

        Product::create($data);

        $data = [
            'product_category_id' => 2,
            'name' => 'Sabun Mandi',
            'stock' => 100,
        ];

        Product::create($data);

        $data = [
            'product_category_id' => 2,
            'name' => 'Sampo',
            'stock' => 100,
        ];

        Product::create($data);
    }
}
