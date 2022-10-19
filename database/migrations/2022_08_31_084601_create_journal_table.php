<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->text('thum')->nullable();
            $table->text('theme')->nullable();
            $table->string('path')->nullable();
            $table->enum('status', ['publish', 'unpublish'])->default('unpublish')->nullable();
            $table->enum('category', ['ekonomi', 'sport', 'computer', 'politik'])->nullable();
            $table->string('issn')->nullable();
            $table->text('filejr')->nullable();
            $table->timestamps();
        });
        Schema::table('journal', function ($table) {
            $table->unique('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal');
    }
}
