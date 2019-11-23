<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            UserAddressesTableSeeder::class,
            ProductsTableSeeder::class,
            ProductAvailabilitiesTableSeeder::class,
            ProductPicturesTableSeeder::class
        ]);
    }
}
