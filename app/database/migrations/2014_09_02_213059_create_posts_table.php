<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function($table) {
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->string('title', 200);
			$table->string('slug', 200);
			$table->text('body');
			$table->timestamps();
		});

		Schema::table('posts', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('posts');
	}

}
