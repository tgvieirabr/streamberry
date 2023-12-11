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
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('nota');
            $table->text('comentario')->nullable();
            $table->foreignId('filme_id')->constrained('filmes');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avaliacoes', function (Blueprint $table) {
            $table->dropForeign(['filme_id']); 
        });
    
        Schema::dropIfExists('avaliacoes');
    }
};
