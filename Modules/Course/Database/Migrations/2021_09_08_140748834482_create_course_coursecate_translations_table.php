<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCourseCateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course__coursecate_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('course_cate_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['course_cate_id', 'locale']);
            $table->foreign('course_cate_id')->references('id')->on('course__coursecates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course__coursecate_translations', function (Blueprint $table) {
            $table->dropForeign(['coursecate_id']);
        });
        Schema::dropIfExists('course__coursecate_translations');
    }
}
