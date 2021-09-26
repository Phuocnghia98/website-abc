<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTeacherTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course__teacher_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('infor')->nullable();
            $table->char('phone',15);
            $table->integer('teacher_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['teacher_id', 'locale']);
            $table->foreign('teacher_id')->references('id')->on('course__teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course__teacher_translations', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
        });
        Schema::dropIfExists('course__teacher_translations');
    }
}
