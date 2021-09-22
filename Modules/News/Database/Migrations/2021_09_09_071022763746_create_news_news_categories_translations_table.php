<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsNewsCategoriesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news__newscat_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('news_categories_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['news_categories_id', 'locale']);
            $table->foreign('news_categories_id')->references('id')->on('news__newscat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news__newscat_translations', function (Blueprint $table) {
            $table->dropForeign(['news_categories_id']);
        });
        Schema::dropIfExists('news__newscat_translations');
    }
}
