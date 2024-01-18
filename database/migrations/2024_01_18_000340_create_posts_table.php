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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('imagem_grande');
            $table->string('alt_imagem_grande');
            $table->string('imagem_media');
            $table->string('alt_imagem_media');
            $table->string('imagem_pequena');
            $table->string('alt_imagem_pequena');
            $table->text('conteudo');
            $table->date('data_publicacao');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
