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
        Schema::create('filme_streaming', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('filme_id')->constrained();
            $table->foreignId('streaming_id')->constrained();
                            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('filme_streaming', function (Blueprint $table) {
            $table->dropForeign(['filme_id']);
            $table->dropForeign(['streaming_id']);
        });
    
        Schema::dropIfExists('filme_streaming');
    }
    
};
