<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesOutgosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes_outgos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('daily');
            $table->integer('incomes_sum_daily');
            $table->integer('outgos_sum_daily');
            $table->string('incomes')->nullable();
            $table->string('outgos')->nullable();
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
        Schema::dropIfExists('incomes_outgos');
    }
}
