<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name', 255);
            $table->string('company_name', 255);
            $table->string('type_of_zakaz', 255); // zakaz have to be changed to english
            $table->string('zakaz'); // zakaz have to be changed to english
            $table->integer('sum'); 
            $table->integer('skidaka'); // skidka have to be changed to english how much he make percentage
            $table->integer('oplachno'); // oplachno have to be changed to english how much he pay
            $table->integer('ostatok'); // ostatok have to be english
            $table->text('comment');
            $table->date('deadline');
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
        Schema::dropIfExists('incomes');
    }
}
