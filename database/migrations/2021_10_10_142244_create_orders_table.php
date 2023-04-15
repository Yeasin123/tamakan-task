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
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('order_return')->default(0);
            $table->string('payment_type')->nullable();
            $table->string('order_invoice')->nullable();
            $table->string('stripe_order_id')->nullable();
            $table->string('paying_amout')->nullable();
            $table->string('bl_transtraction')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('total')->nullable();
            $table->string('status')->default(0);
            $table->string('month')->nullable();
            $table->string('day')->nullable();
            $table->string('year')->nullable();
            $table->string('order_status_code');
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
