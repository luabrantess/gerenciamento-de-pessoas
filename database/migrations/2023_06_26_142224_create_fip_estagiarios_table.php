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
        Schema::create('fip_estagiarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estagiario_id')->constrained('estagiarios')->onDelete('cascade')->onUpdate('cascade');
            $table->date('mes');
            $table->string('fip_assinada');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fip_estagiarios');
    }
};
