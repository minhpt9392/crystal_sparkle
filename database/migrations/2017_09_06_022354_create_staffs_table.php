<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UEN',45)->nullable();
            $table->string('NICK',45)->nullable();
            $table->string('address',45)->nullable();
            $table->string('postal_code',45)->nullable();
            $table->integer('type')->nullable()->comment('1 = manager, 2=therapist, 3=reception, 4 = service, 5=cleaner, 6=sale');
            $table->string('passport_number',45)->nullable();
            $table->dateTime('passport_expiry')->nullable();
            $table->string('permit_type',45)->nullable();
            $table->dateTime('permit_expiry')->nullable();
            $table->dateTime('SPF_approval_date')->nullable();
            $table->string('SPF_approval_number',45)->nullable();
            $table->string('salary_basic',45)->nullable();
            $table->string('salary_C1Type',45)->nullable();
            $table->string('salary_C1Value',45)->nullable();
            $table->string('salary_C2Type',45)->nullable();
            $table->string('salary_C2Threshold',45)->nullable();
            $table->string('salary_C2Value',45)->nullable();
            $table->dateTime('first_visit')->nullable();
            $table->string('remarks',45)->nullable();
            $table->string('PIN',45)->nullable();
            $table->integer('shop_id')->nullable();
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
        Schema::dropIfExists('staffs');
    }
}
