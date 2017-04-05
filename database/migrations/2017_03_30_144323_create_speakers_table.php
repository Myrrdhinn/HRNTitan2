<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('title');
			$table->text('bio')->nullable();
			$table->string('company')->nullable();
			$table->string('profile_pic')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('linkedin')->nullable();
			$table->string('website')->nullable();
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
        Schema::dropIfExists('speakers');
		
    }
}
