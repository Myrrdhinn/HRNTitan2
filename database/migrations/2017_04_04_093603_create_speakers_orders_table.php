<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakersOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('speaker_id');
            $table->tinyInteger('en_sp_order')->nullable();
            $table->tinyInteger('sf_sp_order')->nullable();
            $table->tinyInteger('am_sp_order')->nullable();
            $table->tinyInteger('en_mp_order')->nullable();
            $table->tinyInteger('sf_mp_order')->nullable();
            $table->tinyInteger('am_mp_sorder')->nullable();
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
        Schema::dropIfExists('speakers_orders');
    }
}
