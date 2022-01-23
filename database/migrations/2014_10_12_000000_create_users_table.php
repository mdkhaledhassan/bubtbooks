<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userpic')->default('default.png');
            $table->string('name');
            $table->string('bubtid')->unique();
            $table->string('department');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('intake');
            $table->boolean('is_admin')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('section');
            $table->string('phonenumber');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'userpic' => 'default.png',
                'name' => 'Khaled Hassan',
                'bubtid' => '17182103108',
                'department' => 'CSE',
                'email' => 'khaledbubt@gmail.com',
                'gender' => 'Male',
                'intake' => '38',
                'is_admin' => '1',
                'password' => Hash::make('11@22@33'),
                'section' => '03',
                'phonenumber' => '01733000689',
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
        Schema::dropIfExists('users');
    }
}
