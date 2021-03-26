<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_instructor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('curso_id');

            $table->foreign('instructor_id')
                ->references('id')->on('instructors')
                ->onDelete('cascade');//Se elimina todo si se elimina un instructor
                
            $table->foreign('curso_id')
                ->references('id')->on('cursos')
                ->onDelete('cascade');//Se elimina todo si se elimina el curso

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
        Schema::dropIfExists('curso_instructor');
    }
}
