<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoNivelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_nivel', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('nivel_id');
            $table->unsignedBigInteger('curso_id');

            $table->foreign('nivel_id')
                ->references('id')->on('nivels')
                ->onDelete('cascade');//Cascade, Se elimina todo si se elimina la subcategoria
                
            $table->foreign('curso_id')
                ->references('id')->on('cursos')
                ->onDelete('cascade');//Cascade, Se elimina todo si se elimina el curso

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
        Schema::dropIfExists('curso_nivel');
    }
}
