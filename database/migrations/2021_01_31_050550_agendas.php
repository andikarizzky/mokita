<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Agendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('agenda_id');
            $table->unsignedInteger('user_id');
            $table->string('acara');
            $table->string('tempat');
            $table->dateTime('mulai');
            $table->dateTime('selesai');
            $table->string('disposisi');
            $table->string('satker');
            $table->enum('jenis', ['int', 'pub', 'und', 'bat']);
            $table->enum('slide', ['1', '2', '3']);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('agendas');
    }
}
