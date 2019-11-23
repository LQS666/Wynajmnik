<?php

use Illuminate\Database\Seeder;

class ProductPicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductPicture::class, 10)->state('first')->create();
        factory(App\ProductPicture::class, 10)->create();
    }
}
