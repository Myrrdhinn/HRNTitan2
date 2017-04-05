<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakersStatusSpecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers_status_specials', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('speaker_id');
            $table->tinyInteger('en_ae_status')->default(0);
            $table->tinyInteger('sf_ae_status')->default(0);
            $table->tinyInteger('am_ae_status')->default(0);
            $table->tinyInteger('en_pe_status')->default(0);
            $table->tinyInteger('sf_pe_status')->default(0);
            $table->tinyInteger('am_pe_status')->default(0);
            $table->tinyInteger('en_dhr_status')->default(0);
            $table->tinyInteger('sf_dhr_status')->default(0);
            $table->tinyInteger('am_dhr_status')->default(0);
            $table->tinyInteger('en_blg_status')->default(0);
            $table->tinyInteger('sf_blg_status')->default(0);
            $table->tinyInteger('am_blg_status')->default(0);   
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
        Schema::dropIfExists('speakers_status_specials');
    }
}
