<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('product_id');
			$table->unsignedBigInteger('user_id')->nullable();
			$table->unsignedBigInteger('order_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('product_quantity')->default(1);
            $table->timestamps();
			
			$table->foreign('user_id')
			  ->references('id')->on('users')
			  ->onDelete('cascade');
			  
			  $table->foreign('product_id')
			  ->references('id')->on('products')
			  ->onDelete('cascade');
			  
			  $table->foreign('order_id')
			  ->references('id')->on('orders')
			  ->onDelete('cascade');
			  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
