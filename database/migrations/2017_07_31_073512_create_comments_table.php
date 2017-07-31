<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('comment_text', 65535);
			$table->softDeletes();
			$table->integer('is_blocked')->default(0);
			$table->timestamps();
			$table->integer('user_id')->unsigned()->index('comments_user_id_foreign');
			$table->integer('playlist_id')->unsigned()->index('comments_playlist_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
