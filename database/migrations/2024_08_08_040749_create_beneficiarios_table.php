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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id('id_beneficiario');
            $table->string('nombre_beneficiario');
            $table->string('aPaterno_beneficiario');
            $table->string('aMaterno_beneficiario');
            $table->string('direccion_beneficiario');
            $table->string('colonia_beneficiario');
            $table->double('latitud_beneficiario');
            $table->double('longitud_beneficiario');
            $table->boolean('isTitular_beneficiario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
