<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo');
            $table->string('cover1');
            $table->string('cover2');
            $table->string('cover3');
            $table->string('phonenumber');
            $table->string('email');
            $table->string('address');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('gplus');
            $table->string('mail');
            $table->string('github');
            $table->timestamps();
        });

        DB::table('settings')->insert(
            array(
                
                'title' => 'BUBTBOOKS - BUBT Books Store',
                'logo' => 'logo.png',
                'cover1' => 'cover1.jpg',
                'cover2' => 'cover2.jpg',
                'cover3' => 'cover3.jpg',
                'phonenumber' => '+8801733000689',
                'email' => 'admin@bubtbooks.com',
                'address' => 'Rupnagar R/A, Mirpur-2, Dhaka-1216',    
                'facebook' => 'https://facebook.com/bubtbooks',
                'twitter' => 'https://twitter.com/KhaledH96632575',
                'instagram' => 'https://www.instagram.com/khaledhassanreza/',
                'gplus' => '#',
                'mail' => 'admin@bubtbooks.com',
                'github' => 'https://github.com/khaledbubt',            
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
