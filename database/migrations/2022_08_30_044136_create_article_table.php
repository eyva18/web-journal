<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('path_jr', 100);
            $table->bigInteger('id_issue')->unsigned()->nullable();
            $table->String('judul_article')->nullable();
            $table->String('author')->nullable();
            $table->text('abstract')->nullable();
            $table->String('image')->nullable();
            $table->text('isi')->nullable();
            $table->text('filearticle')->nullable();
            $table->timestamps();
        });
        Schema::table('article', function (Blueprint $table){
            $table->foreign('id_issue')->references('id')->on('issue')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }


}
