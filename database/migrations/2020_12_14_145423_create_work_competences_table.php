<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkCompetencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_competences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_process_id');
            $table->unsignedBigInteger('competence_id');
            $table->timestamps();
            $table->foreign('work_process_id')->references('id')->on('work_processes');
            $table->foreign('competence_id')->references('id')->on('competences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_competences');
    }
}
