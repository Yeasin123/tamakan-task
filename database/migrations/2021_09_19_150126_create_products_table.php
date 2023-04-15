<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('brand')->nullable();
            $table->string('title');
            $table->text('description');
            $table->decimal('price');
            $table->decimal('discountPercentage')->nullable();
            $table->decimal('rating')->nullable();
            $table->integer('stock');
            $table->string('thumbnail');
            $table->json('images');
        

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
        Schema::dropIfExists('products');
    }
}
