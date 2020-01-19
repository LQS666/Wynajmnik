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
            ProductionSeeder::class

            // Develop seeders
            //UsersTableSeeder::class,
            //UserAddressesTableSeeder::class,
            //ProductsTableSeeder::class,
            //ProductPicturesTableSeeder::class,
            //OfferTableSeeder::class,
            //CategoriesTableSeeder::class,
            //CategoryProductTableSeeder::class,
            //FiltersTableSeeder::class,
            //FilterValuesTableSeeder::class,
            //FilterValueProductTableSeeder::class,
            //SitesTableSeeder::class,
        ]);
    }
}
