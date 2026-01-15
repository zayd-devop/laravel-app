<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participations', function (Blueprint $table) {
            $table->foreignId('films_id')->constrained('films');
            $table->foreignId('acteur_id')->constrained('acteurs');
            $table->string('role');
            $table->primary(['films_id','acteur_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
