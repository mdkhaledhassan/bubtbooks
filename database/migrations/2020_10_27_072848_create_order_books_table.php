<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('order_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderid');
            $table->unsignedBigInteger('paymentid');
            $table->unsignedBigInteger('bookid');
            $table->foreign('bookid')->references('id')->on('books');
            $table->string('bookname');
            $table->string('quantity');
            $table->string('bookprice');
            $table->string('total');
            $table->softDeletes();
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
        Schema::dropIfExists('order_books');
    }
}
