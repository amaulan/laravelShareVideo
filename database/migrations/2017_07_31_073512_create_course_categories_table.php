<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id')->unsigned()->index('courses_categories_course_id_foreign');
			$table->integer('category_id')->unsigned()->index('courses_categories_category_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_categories');
	}

}
