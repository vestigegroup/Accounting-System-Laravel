<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutgosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ispolnitelni');
            $table->integer('summa');
            $table->date('data');
            $table->string('naimenovanie');
            $table->string('ed_izm')->nullable();
            $table->string('kol_vo');
            $table->integer('sena');
            $table->integer('obwiya');
            $table->integer('tip_id');
            $table->integer('tip_type_id');
            $table->string('tip_name');
            $table->softDeletes();
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
        Schema::dropIfExists('outgos');
    }
}
