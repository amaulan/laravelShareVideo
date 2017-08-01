<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCourseCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('course_categories', function(Blueprint $table)
		{
			$table->foreign('category_id', 'courses_categories_category_id_foreign')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('course_id', 'courses_categories_course_id_foreign')->references('id')->on('courses')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('course_categories', function(Blueprint $table)
		{
			$table->dropForeign('courses_categories_category_id_foreign');
			$table->dropForeign('courses_categories_course_id_foreign');
		});
	}

}
