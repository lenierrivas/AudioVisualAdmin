<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgfiles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('id_imagenes');  
            $table->string('file');
            $table->string('fileprincipal')->nullable();

            $table->timestamps();

            //RELACION IMGFILE->IMAGENES
            $table->foreign('id_imagenes')
            ->references('id')
            ->on('imagenes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imgfiles');
    }
}
