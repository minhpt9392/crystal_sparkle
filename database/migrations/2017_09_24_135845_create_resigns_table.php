<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('resigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('STAFF_AccID')->nullable();
            $table->dateTime('action_date')->nullable();
            $table->dateTime('submit_date')->nullable();
            $table->string('reason')->nullable();
            $table->integer('approval_StaffID')->nullable();
            $table->integer('type')->nullable()->comment('1=Resign,2=Fire');;
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
        Schema::dropIfExists('resigns');
    }
}
