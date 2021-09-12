<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsNewsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news__news_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('title');
            $table->text('content');
            $table->string('slug');
            $table->tinyInteger('status')->default(1);
            $table->string('description');
            $table->integer('user_id');
            $table->integer('cat_id');
            $table->integer('news_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['news_id', 'locale']);
            $table->foreign('news_id')->references('id')->on('news__news')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('cat_id')->references('id')->on('news__news_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news__news_translations', function (Blueprint $table) {
            $table->dropForeign(['news_id']);
        });
        Schema::dropIfExists('news__news_translations');
    }
}
