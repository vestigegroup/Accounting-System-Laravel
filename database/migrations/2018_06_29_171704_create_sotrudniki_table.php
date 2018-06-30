<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSotrudnikiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sotrudniki', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imja_sotrudnika');
            $table->date('data_rojdeniya');
            $table->string('mesto_rojdeniya');
            $table->string('telefon');
            $table->string('zarplata');
            $table->text('doljnost');
            $table->text('photo_path');
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
        Schema::dropIfExists('sotrudniki');
    }
}
