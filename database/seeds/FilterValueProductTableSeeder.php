<?php

use App\Filter;
use App\FilterValue;
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class FilterValueProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $filters = Filter::all()->pluck('id')->toArray();

        foreach ($products as $product) {
            foreach ($filters as $filter) {
                $filter_values = FilterValue::all()->where('filter_id', '=', $filter)->pluck('id')->toArray();
                if ($filter_values) {
                    $product->filterValues()->attach($filter_value = Arr::random($filter_values));
                }
            }
        }
    }
}
