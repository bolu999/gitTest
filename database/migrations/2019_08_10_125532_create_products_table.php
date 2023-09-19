<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('promotion')->default(0);
            $table->boolean('hasSpec')->default(0);
            $table->integer('category_id')->nullable();
            $table->integer('rate')->nullable();
            $table->string('image_link1')->nullable();
            $table->string('image_link2')->nullable();
            $table->string('image_link3')->nullable();
            $table->integer('inventory_qty')->nullable();
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
