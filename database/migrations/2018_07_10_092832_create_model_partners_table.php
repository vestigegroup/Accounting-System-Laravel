<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazivaniye_firma');
            $table->string('tip_zanyata');
            $table->string('marketolog');
            $table->string('tip_skidka');
            $table->string('telefon');
            $table->string('mail');
            $table->string('website');
            $table->string('adress');
            $table->text('photo_path');
            $table->text('zametka');
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
        Schema::dropIfExists('model_partners');
    }
}
