<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMassageServiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('massage_service_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_eng',45)->nullable();
            $table->string('name_cn',45)->nullable();
            $table->integer('length')->nullable();
            $table->string('full_price',45)->nullable();
            $table->string('PPP_Type1_Price',45)->nullable();
            $table->string('PPP_Type2_Price',45)->nullable();
            $table->string('PPP_Type3_Price',45)->nullable();
            $table->string('PPP_Type4_Price',45)->nullable();
            $table->string('PPP_Type5_Price',45)->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('auto_approval',45)->nullable();
            $table->string('ITM_Type',45)->nullable()->comment('1=Massage,2=Addons,3=Goods.');
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
        Schema::dropIfExists('massage_service_items');
    }
}
