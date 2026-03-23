<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stand_id');
            $table->timestamps();
            $table->string('real_name_full');
            $table->string('user_name');
            $table->string('name_mini');
            $table->bigInteger('sum');
            $table->bigInteger('sum_for_client');
            $table->dateTime('date_last_order');

            $table->index('name_mini');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
