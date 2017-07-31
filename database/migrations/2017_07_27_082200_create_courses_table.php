<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_name',255);
            $table->string('course_picture',255);
            $table->tinyInteger('permission')->default(0);
            $table->tinyInteger('is_publish')->default(0);
            $table->tinyInteger('can_comment')->default(1);
            $table->tinyInteger('complete')->default(0);
            $table->timestamp('publish_at')->nullable();
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('class_id')
                  ->unsigned();
            $table->foreign('class_id')
                  ->references('id')
                  ->on('classes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
    }
}
