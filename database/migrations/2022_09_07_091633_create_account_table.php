<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->text('password');
            $table->string('status')->default('guest');
            $table->bigInteger('id_journal')->unsigned()->nullable()->constrained();
            $table->timestamps();
        });
        Schema::table('account', function (Blueprint $table) {
            $table->foreign('id_journal')->references('id')->on('journal')->onDelete('cascade')->onUpdate('cascade');
        });
        DB::table('account')->insert(
            array(
                [
                    'username' => 'admin',
                    'password' => 'admin123',
                    'status' => 'admin'
                ],
                [
                    'username' => 'nayif',
                    'password' => 'nayif123',
                    'status' => 'nayif'
                ],
                [
                    'username' => 'taufiq',
                    'password' => 'taufiq123',
                    'status' => 'taufiq'
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
