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
            $table->string('invoice')->nullable();
            $table->unsignedBigInteger('orderid');
            $table->string('userid');
            $table->string('username');           
            $table->string('address');
            $table->string('phonenumber');
            $table->string('email');
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('paymentid');
            $table->string('senderphonenumber')->nullable();
            $table->string('trxid')->nullable();
            $table->string('paymentmethod');
            $table->string('totalamount');
            $table->string('paymentamount')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
