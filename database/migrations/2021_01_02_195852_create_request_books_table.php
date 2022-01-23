<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_books', function (Blueprint $table) {
            $table->id();
            $table->string('bookname');
            $table->string('authorname');
            $table->string('depname');
            $table->string('semname');
            $table->string('coursecode');
            $table->string('bookpdf');
            $table->string('bookpic')->default('bookdefault.jpg');
            $table->string('reqby');
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
        Schema::dropIfExists('request_books');
    }
}
