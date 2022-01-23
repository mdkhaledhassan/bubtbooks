<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('bookname');
            $table->string('authorname');
            $table->string('depname');
            $table->string('semname');
            $table->string('coursecode');
            $table->string('buyingprice');
            $table->string('sellingprice');
            $table->string('totalquantity');
            $table->string('bookpdf');
            $table->string('bookpic')->default('bookdefault.jpg');
            $table->integer('view_count')->default(0);
            $table->string('admin');

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
        Schema::dropIfExists('books');
    }
}
