<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_details_id')->comment('Id de la tarea realizada')->unsigned();
            $table->bigInteger('users_id')->comment('Id del usuario')->unsigned();
            $table->integer('duration')->comment('Tiempo que dura el usuario en la tarea asignada');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('task_details_id')->references('id')->on('task_details');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tasks');
    }
}
