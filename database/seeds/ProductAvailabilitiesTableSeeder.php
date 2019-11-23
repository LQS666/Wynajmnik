<?php

use Illuminate\Database\Seeder;

class ProductAvailabilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductAvailability::class, 10)->state('first')->create();
        factory(App\ProductAvailability::class, 10)->create();
    }
}
