<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmoneys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //
        Schema::create('emoneys',function($table){
            $table->increments('id');
            $table->string('ecurrency',32);
            $table->string('shortname', 32);
            $table->string('currency', 32);
            $table->string('img_url');
            $table->string('web_url');
            $table->string('accountid');
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
        Schema::drop();
	}

}
