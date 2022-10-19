<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopulerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('populer_journal', function (Blueprint $table) {
            $table->id();
            $table->string('path_jr');
            $table->integer('views');
            $table->timestamps();
        });
        Schema::table('populer_journal', function (Blueprint $table){
            $table->foreign('path_jr')->references('path')->on('journal')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('populer');
    }
}
