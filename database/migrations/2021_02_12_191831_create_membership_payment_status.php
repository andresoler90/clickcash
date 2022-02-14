<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipPaymentStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_payment_status', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user_membership')->comment('id de la transaccion creada para el pago de la membresia')->unsigned();
            $table->foreign('id_user_membership')->references('id')->on('user_memberships');
            $table->string('id_transaction')->comment('id de la transaccion que se le consulta el estado');
            $table->integer('status')->comment('estado de la transacción al momento de consultarla 0: pendiente de pago 100:pagada');
            $table->string('status_description')->comment('descripción del estado de la transaccón');
            $table->string('type_coin')->comment('tipo de la moneda de pago');
            $table->float('payment_received')->comment('Pago recibido en el momento de consultar el pago');
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
        Schema::dropIfExists('membership_payment_status');
    }
}
