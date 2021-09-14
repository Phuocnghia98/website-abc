<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCourseTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course__course_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->float('price');
            $table->float('promotion_price')->nullable();
            $table->boolean('status')->default(0);
            $table->text('content')->nullable();
            $table->integer('course_cates_id')->index();
            $table->integer('teacher_id')->index();
            $table->integer('course_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['course_id', 'locale']);
            $table->foreign('course_id')->references('id')->on('course__courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course__course_translations', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
        });
        Schema::dropIfExists('course__course_translations');
    }
}
