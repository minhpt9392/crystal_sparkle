<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NRIC',45)->nullable();
            $table->string('name',45)->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender',45)->nullable();
            $table->string('mobile',45)->nullable();
            $table->string('email',45)->nullable();
            $table->string('add',45)->nullable();
            $table->string('postal_code',45)->nullable();
            $table->string('nationality',45)->nullable();
            $table->dateTime('first_visit')->nullable();
            $table->string('remarks',45)->nullable();
            $table->string('PIN',45)->nullable();
            $table->string('SHOP',45)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
