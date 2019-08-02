<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('maintitle', 150);
            $table->string('secondtitle', 150);
            $table->string('label');
            $table->string('location', 150);
            $table->integer('extension');
            $table->integer('type');
            $table->integer('audiochannels');
            $table->integer('Versiones');
            $table->string('file');
            $table->text('description');
            $table->string('status')->default('PRODUCCIÓN');
            
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
        Schema::dropIfExists('videos');
    }
}
