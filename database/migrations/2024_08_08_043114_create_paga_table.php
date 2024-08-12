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
        Schema::create('paga', function (Blueprint $table) {
            $table->id('id_pago');
            $table->unsignedBigInteger('id_tarjeta')->nullable();
            $table->foreign('id_tarjeta')
                ->references('id_tarjeta')
                ->on('tarjetas')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->timestamp('fecha_pago');
            $table->integer('meses_pago');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paga');
    }
};
