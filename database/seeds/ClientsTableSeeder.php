<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Client::create([
                'ar' => [
                    'name' => 'Client ' . $i . ' ar',
                    'address' => 'Client address' . $i . ' ar',
                ],

                'en' => [
                    'name' => 'Client ' . $i . ' en',
                    'address' => 'Client address' . $i . ' en'
                ],

                'phone' => '0115484590' . $i

            ]);
        }
    }
}
