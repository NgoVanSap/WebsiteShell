<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_carts', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_user_id');
            $table->string('bill_name');
            $table->string('bill_phone');
            $table->string('bill_email');
            $table->string('bill_address');
            $table->string('bill_note');
            $table->string('bill_payment');
            $table->double('bill_total');
            $table->double('amount_of_all_products');
            $table->string('bill_status');
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
        Schema::dropIfExists('bill_carts');
    }
}
