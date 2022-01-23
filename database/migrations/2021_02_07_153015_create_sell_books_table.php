<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bubtid');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('bookname');
            $table->string('bookpic')->default('bookdefault.jpg');
            $table->string('authorname')->nullable();
            $table->string('depname')->nullable();
            $table->string('semname')->nullable();
            $table->string('coursecode')->nullable();
            $table->string('booktype');
            $table->string('price');
            $table->string('description');
            $table->string('status');
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
        Schema::dropIfExists('sell_books');
    }
}
