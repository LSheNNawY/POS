<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'category_id'       => rand(1, 5),
                'purchase_price'    => rand(200, 1000),
                'sale_price'        => rand(200, 1000),
                'stock'             => rand(20, 70),
                'image'             => 'default-product.png',

                'ar' => [
                    'name' => 'product' . $i . 'ar',
                    'description' => 'product' . $i . ' desc. ar',
                ],

                'en' => [
                    'name' => 'product' . $i . 'en',
                    'description' => 'product' . $i . ' desc. en',
                ],

            ]);
        }
    }
}
