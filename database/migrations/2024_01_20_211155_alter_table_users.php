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
        Schema::table("users", function (Blueprint $table) {
            $table->string("imagem_pequena")->nullable()->after("password");
            $table->string("alt_imagem_pequena")->nullable()->after("imagem_pequena");
            $table->string("imagem_grande")->nullable()->after("alt_imagem_pequena");
            $table->string("alt_imagem_grande")->nullable()->after("imagem_grande");
            $table->text("biografia")->nullable()->after("alt_imagem_grande");
            $table->string("facebook")->nullable()->after("biografia");
            $table->string("instagram")->nullable()->after("facebook");
            $table->string("twitter")->nullable()->after("instagram");
            $table->string("youtube")->nullable()->after("twitter");
            $table->string("profissao")->nullable()->after("youtube");
        });

        Schema::table("posts", function (Blueprint $table) {
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
