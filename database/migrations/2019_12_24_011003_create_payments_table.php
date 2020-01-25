<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedDecimal('amount');
            $table->string('desc');
            $table->ipAddress('client_ip');
            $table->string('session_id');
            $table->bigInteger('ts');
            $table->string('sig')->nullable();
            $table->unsignedSmallInteger('status')->default(0);
            $table->unsignedSmallInteger('error')->default(0);
            $table->boolean('returned')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
