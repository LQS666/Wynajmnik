<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $categoriesMain = [1, 2];
        $categoriesSub1 = Category::all()->where('sub', '=', 1)->pluck('id')->toArray();
        $categoriesSub2 = Category::all()->where('sub', '=', 2)->pluck('id')->toArray();

        foreach ($products as $product) {
            $main = Arr::random($categoriesMain);

            $product->categories()->attach($main);
            if ($main === 1) {
                $product->categories()->attach(Arr::random($categoriesSub1));
            } else {
                $product->categories()->attach(Arr::random($categoriesSub2));
            }
        }
    }
}
