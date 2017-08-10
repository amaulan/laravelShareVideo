<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('course_name');
			$table->text('course_desc', 65535);
			$table->string('course_picture');
			$table->integer('plyalist_add')->default(0);
			$table->boolean('permission')->default(0);
			$table->boolean('is_publish')->default(0);
			$table->boolean('can_comment')->default(1);
			$table->boolean('complete')->nullable();
			$table->dateTime('publish_at')->nullable();
			$table->timestamps();
			$table->integer('user_id')->unsigned()->index('courses_user_id_foreign');
			$table->integer('level_id')->unsigned()->index('courses_class_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
