<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('users',function($table){
            $table->increments('id');
            $table->string('fname',32);
            $table->string('lname', 32);
			$table->string('username', 32);
            $table->string('img_url',250);
            $table->string('company',500);
            $table->string('address',250);
            $table->string('phone',50);
            $table->string('city',50);
            $table->string('country',100);
            $table->string('ipaddress',50);
			$table->string('email', 320);
			$table->string('password', 64);
            // required for Laravel 4.1.26
            $table->string('remember_token', 100)->nullable();
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
		//
        Schema::drop("users");
	}

}
