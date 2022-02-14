<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_config_id')->comment('Id de la configuración asignada a la tarea')->unsigned();
            $table->foreign('task_config_id')->references('id')->on('task_configs');
            $table->string('description')->comment('Descripcion de la tarea que se crea');
            $table->string('link')->comment('Url que pertenece a la tarea creada');
            $table->bigInteger('created_user')->comment('Id del usuario que crea la tarea')->unsigned();
            $table->foreign('created_user')->references('id')->on('users');

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
        Schema::dropIfExists('task_details');
    }
}
