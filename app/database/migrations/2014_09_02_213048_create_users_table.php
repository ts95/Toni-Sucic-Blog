<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up() {
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('email', 60)->unique();
			$table->string('password', 60);
			$table->string('name', 60);
			$table->rememberToken();
			$table->timestamps();
		});

		User::create([
			'email'		=> 'TeKanne774@gmail.com',
			'name'		=> 'Toni Sučić',
			'password'	=> '$2y$10$MwloeERhwtI7mtXLDb0JhOSYN5ZxgZ5cS22HeGO0SKhQXvdtQshOK',
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
	}

}