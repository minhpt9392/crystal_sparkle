<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable();
            $table->integer('shop_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->date('date_start')->nullable();
            $table->integer('therapist_id')->nullable();
            $table->integer('time')->nullable();
            $table->string('time_start')->nullable();
            $table->string('promotion')->nullable();
            $table->enum('status',['Tentative','Completed','No-show'])->nullable();
            $table->string('create_by')->nullable();
            $table->string('update_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('bookings');
    }
}
