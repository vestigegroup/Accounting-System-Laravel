<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDolgiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dolgi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('income_id')->unsigned();
            $table->foreign('income_id')->references('id')->on('incomes')->onDelete('cascade');
            $table->string('naimenovanie_klienty');
            $table->date('data_dolgi');
            $table->integer('summa');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dolgi');
    }
}
