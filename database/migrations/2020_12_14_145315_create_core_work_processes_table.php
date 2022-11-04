<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoreWorkProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_work_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('core_task_id');
            $table->unsignedBigInteger('work_process_id');
            $table->timestamps();
            $table->foreign('core_task_id')->references('id')->on('core_tasks');
            $table->foreign('work_process_id')->references('id')->on('work_processes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_work_processes');
    }
}
