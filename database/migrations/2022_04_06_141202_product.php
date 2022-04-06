<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
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
            $table->string('sku')->unique();
            $table->integer('is_active');
            $table->integer('is_in_stock');
            $table->string('title');
            $table->string('url');
            $table->string('qty');
            $table->string('price');
            $table->string('sale_price')->nullable();
            $table->timestamp('sale_price_from')->nullable();
            $table->timestamp('sale_price_to')->nullable();
            $table->text('desc')->nullable();
            $table->text('short_desc')->nullable();
            $table->text('thumbnail')->nullable();
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
