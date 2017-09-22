<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('UEN')->nullable();
            $table->string('company_name',45)->nullable();
            $table->string('business_name',50)->nullable();
            $table->string('ME_Lic',45)->nullable();
            $table->string('ME_Exp',45)->nullable();
            $table->string('CASE_Exp',45)->nullable();
            $table->string('LIC_OwnerID',45)->nullable();
            $table->string('LIC_Owner_Name',45)->nullable();
            $table->string('LIC_Owner_Mobile',45)->nullable();
            $table->string('total_room',45)->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('type')->nullable()->comment('1=massage,2=nails,3=hair');
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->integer('general_managerID')->nullable();
            $table->string('payment_default')->nullable()->comment('1= before service, 2 = after service');
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
