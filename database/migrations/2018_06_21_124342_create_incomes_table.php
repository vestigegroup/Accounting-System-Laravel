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
            $table->string('kolvo'); 
            $table->integer('stoimost_zakaz'); 
            $table->integer('sena_zakaz'); // skidka have to be changed to english how much he make percentage
            $table->integer('obshiye_summa'); // oplachno have to be changed to english how much he pay
            $table->integer('oplachno'); // ostatok have to be english
            $table->integer('ostotok');
            $table->text('zametka')->nullable();
            $table->date('srok');
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
        Schema::dropIfExists('incomes');
    }
}
