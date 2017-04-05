<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakersStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('speaker_id');
            $table->tinyInteger('en_sp_status')->default(0);
            $table->tinyInteger('sf_sp_status')->default(0);
            $table->tinyInteger('am_sp_status')->default(0);
            $table->tinyInteger('en_mp_status')->default(0);
            $table->tinyInteger('sf_mp_status')->default(0);
            $table->tinyInteger('am_mp_status')->default(0);
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
        Schema::dropIfExists('speakers_statuses');
    }
}
