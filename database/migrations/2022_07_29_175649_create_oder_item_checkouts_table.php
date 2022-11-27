<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOderItemCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oder_item_checkouts', function (Blueprint $table) {
            $table->id();
            $table->integer('oder_product_id');
            $table->integer('oder_user_id');
            $table->integer('oder_bill_cart_id');
            $table->integer('oder_cart_id_attribute');
            $table->integer('oder_quantity');
            $table->double('oder_price');
            $table->string('oder_status');
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
        Schema::dropIfExists('oder_item_checkouts');
    }
}
