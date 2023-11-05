<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('location');
            $table->string('pin');
            $table->double('amount');
            $table->string('coupon_code');
            $table->double('discounted_amount');
            $table->double('delivery_charge');
            $table->double('packing_price');
            $table->double('tax_amount');
            $table->double('total_amount');
            $table->integer('status')->default(1)->comment('1=new,2=accepted,3=delivered,4=cancelled');
            $table->text('cancellation_reason');
            $table->string('transaction_id');
            $table->integer('payment_status')->default(0)->comment('1=paid');
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
        Schema::dropIfExists('orders');
    }
}
