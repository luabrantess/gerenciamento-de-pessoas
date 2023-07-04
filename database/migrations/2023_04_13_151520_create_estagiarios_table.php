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
        Schema::create('estagiarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->date('nascimento');
            $table->string('cpf');
            $table->string('email');
            $table->string('telefone');
            $table->string('faculdade');
            $table->string('cnpj_faculdade');
            $table->string('curso');
            $table->date('expectativa_formacao');
            $table->string('termo_assinado')->nullable();
            $table->date('inicio_contrato');
            $table->date('fim_contrato');
            $table->boolean('ativo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estagiarios');
    }
};
