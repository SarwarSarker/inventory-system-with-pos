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
            $table->string('cat_name');
            $table->string('sup_name');
            $table->string('p_name');
            $table->string('p_code');
            $table->string('p_image');
            $table->string('quantity');
            $table->string('buying_price');
            $table->string('selling_price');
            $table->string('buying_date');
            $table->string('expiry_date');
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
