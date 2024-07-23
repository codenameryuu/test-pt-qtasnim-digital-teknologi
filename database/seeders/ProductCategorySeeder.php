<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        $data = [
            'name' => 'Konsumsi',
            'description' => 'Kategori konsumsi',
        ];

        ProductCategory::create($data);

        $data = [
            'name' => 'Pembersih',
            'description' => 'Kategori pembersih',
        ];

        ProductCategory::create($data);
    }
}
