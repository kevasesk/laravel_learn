<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewProductAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->addColumn('tinyInteger', 'status')->default(0);
            $table->addColumn('integer', 'color')->default(0);
            $table->addColumn('tinyInteger', 'is_popular')->default(0);
            $table->addColumn('tinyInteger', 'is_top_rated')->default(0);
            $table->addColumn('tinyInteger', 'is_new')->default(0);
            $table->addColumn('text',  'brand')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->removeColumn('status');
            $table->removeColumn('color');
            $table->removeColumn('is_popular');
            $table->removeColumn('is_top_rated');
            $table->removeColumn('is_new');
            $table->removeColumn('brand');
        });
    }
}
