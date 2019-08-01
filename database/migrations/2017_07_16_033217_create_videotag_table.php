<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideotagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videotag', function (Blueprint $table) {
            $table->integer('id_video')->unsigned();
            $table->foreign('id_video')
            ->references('id_video')->on('videos')
            ->onDelete('cascade');
            $table->integer('id_tag')->unsigned();
            $table->foreign('id_tag')
            ->references('id_tag')->on('tags')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videotag');
    }
}
