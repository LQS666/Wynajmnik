<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueIndexForFilterProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filter_value_product', function (Blueprint $table) {
            $table->unique(['filter_value_id', 'product_id'], 'fvid_pid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filter_value_product', function (Blueprint $table) {
            $table->dropUnique('fvid_pid');
        });
    }
}
