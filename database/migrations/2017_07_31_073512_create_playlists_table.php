<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlaylistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('playlists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('playlists_name');
			$table->string('playlists_video');
			$table->string('video_length');
			$table->integer('playlists_watched');
			$table->boolean('can_comment')->default(1);
			$table->dateTime('publish_at')->nullable();
			$table->timestamps();
			$table->integer('course_id')->unsigned()->index('playlists_course_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('playlists');
	}

}
