<?php

use Illuminate\Database\Seeder;

class UserAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserAddress::class, 5)->state('first')->create();
        factory(App\UserAddress::class, 10)->create();
    }
}
