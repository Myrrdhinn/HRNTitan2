<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakersOrderSpecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers_order_specials', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('speaker_id');
            $table->tinyInteger('en_ae_order')->nullable();
            $table->tinyInteger('sf_ae_order')->nullable();
            $table->tinyInteger('am_ae_order')->nullable();
            $table->tinyInteger('en_pe_order')->nullable();
            $table->tinyInteger('sf_pe_order')->nullable();
            $table->tinyInteger('am_pe_order')->nullable();
            $table->tinyInteger('en_dhr_order')->nullable();
            $table->tinyInteger('sf_dhr_order')->nullable();
            $table->tinyInteger('am_dhr_order')->nullable();
            $table->tinyInteger('en_blg_order')->nullable();
            $table->tinyInteger('sf_blg_order')->nullable();
            $table->tinyInteger('am_blg_order')->nullable();
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
        Schema::dropIfExists('speakers_order_specials');
    }
}
