<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string("concepto");
            $table->integer("num");
            $table->date("fecha");
            $table->time("hora");
            $table->string("medio");
            $table->string("valor");
            $table->string("tipo");
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->foreign("cliente_id")->references("id")->on("clientes");
            $table->unsignedBigInteger("provider_id")->nullable();
            $table->foreign("provider_id")->references("id")->on("providers");
            $table->unsignedBigInteger("negocio_id");
            $table->foreign("negocio_id")->references("id")->on("negocios");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->softDeletes();
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
        Schema::dropIfExists('sales');
    }
};
