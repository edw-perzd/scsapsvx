<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id('id_tarjeta');
            $table->unsignedBigInteger('numero_tarjeta');
            $table->string('tipoUsuario_tarjeta');
            $table->double('monto_tarjeta');
            $table->integer('mesesPendientes_tarjeta');
            $table->unsignedBigInteger('id_beneficiario');
            $table->foreign('id_beneficiario')
                ->references('id_beneficiario')
                ->on('beneficiarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarjetas');
    }
};
