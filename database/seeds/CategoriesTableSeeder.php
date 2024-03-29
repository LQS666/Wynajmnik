<?php

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
        factory(App\Category::class, 2)->create();
        factory(App\Category::class, 10)->state('Sub1')->create();
        factory(App\Category::class, 10)->state('Sub2')->create();
    }
}
