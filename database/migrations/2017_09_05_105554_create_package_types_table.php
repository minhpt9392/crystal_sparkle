<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('package_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',45)->nullable();
            $table->integer('type')->nullable()->comment('1:Service quantity, 2:monetary value');
            $table->float('price')->nullable();
            $table->float('bonus_value')->nullable();
            $table->integer('time_period')->nullable();
            $table->float('commission')->nullable();
            $table->integer('package_range')->nullable()->comment('1:Global, 2:Instance');
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
        Schema::dropIfExists('package_types');
    }
}
