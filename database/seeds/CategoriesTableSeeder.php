<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'ar' => ['name' => 'Category ' . $i . ' ar'],
                'en' => ['name' => 'Category ' . $i . ' en']
            ]);
        }
    }
}
