<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_externo');
            $table->string('nombre');
            $table->string('link_logo');
            $table->text('descripcion');
            $table->text('conceptos_importantes');
            $table->string('tiempo_curso');
            $table->integer('num_videos');
            $table->integer('num_lecturas');
            $table->string('link_video');
            
            
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
        Schema::dropIfExists('cursos');
    }
}
