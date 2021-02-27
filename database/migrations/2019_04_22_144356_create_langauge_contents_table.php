<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLangaugeContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langauge_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('languageId');
            $table->string('chapter');
            $table->string('chapterSub');
            $table->longText('value');
            $table->integer('dataId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('langauge_contents');
    }
}
