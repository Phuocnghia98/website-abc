<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUiwebFooterTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uiweb__footer_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('copyright');

            $table->integer('footer_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['footer_id', 'locale']);
            $table->foreign('footer_id')->references('id')->on('uiweb__footers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uiweb__footer_translations', function (Blueprint $table) {
            $table->dropForeign(['footer_id']);
        });
        Schema::dropIfExists('uiweb__footer_translations');
    }
}
