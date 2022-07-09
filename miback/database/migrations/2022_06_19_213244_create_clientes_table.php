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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("celular")->nullable();
            $table->string("tipodocumento")->nullable();
            $table->string("cinit")->nullable();
            $table->string("comentario")->nullable();
            $table->double("lat",11,7)->nullable()->default(0);
            $table->double("lng",11,7)->nullable()->default(0);
            $table->unsignedBigInteger("negocio_id");
            $table->foreign("negocio_id")->references("id")->on("negocios");
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
        Schema::dropIfExists('clientes');
    }
};
