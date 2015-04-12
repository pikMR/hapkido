<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->mediumText('first_name')->nullable();
                        $table->mediumText('last_name')->nullable();
                        $table->string('email')->unique();
                        $table->string('password',60);
                        $table->boolean('active')->default(true);
                        $table->enum('type',array_keys(config('options.types')));
                        $table->string('full_name');
                        $table->rememberToken();
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
		Schema::drop('users');
	}

}
