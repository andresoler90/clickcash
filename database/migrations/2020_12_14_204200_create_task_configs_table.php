<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_configs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('periodicity', ['daily', 'weekly', 'monthly'])->comment('Periodicidad de las tareas');
            $table->integer('value')->comment('Valor que corresponde a la misma peridicidad')->unsigned()->nullable();
            $table->timestamp('date')->comment('Fecha de configuración de la cual se va a repetir la tarea');
            $table->bigInteger('created_users_id')->comment('Id del usuario que crea la configuración')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_configs');
    }
}
