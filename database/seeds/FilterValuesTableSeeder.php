<?php

use Illuminate\Database\Seeder;

class FilterValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FilterValue::class, 80)->create();
    }
}
