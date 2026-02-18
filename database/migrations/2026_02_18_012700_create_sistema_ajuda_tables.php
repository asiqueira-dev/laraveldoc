<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabela de Temas (Categorias)
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Ex: Instalação & Start
            $table->string('icone')->default('bi-box'); // Ex: bi-power
            $table->string('slug')->unique(); // Para âncoras na URL
            $table->integer('ordem')->default(0);
            $table->timestamps();
        });

        // 2. Tabela de Comandos
        Schema::create('comandos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tema_id')->constrained('temas')->onDelete('cascade');
            $table->string('titulo'); // Ex: Instala Laravel
            $table->text('codigo'); // O comando em si
            $table->text('descricao')->nullable(); // Opcional
            $table->integer('ordem')->default(0);
            $table->timestamps();
        });

        // 3. Tabela de Guias (Para "Início Rápido" e "Helper Global")
        Schema::create('guias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Ex: Início Rápido
            $table->string('subtitulo')->nullable(); // Ex: Dica Pro: Helper Global
            $table->string('icone')->nullable();
            $table->string('classe_cor')->default('bg-blue-soft'); // Para estilo CSS
            $table->enum('layout', ['lista_simples', 'passo_a_passo']); // Define o visual
            $table->integer('ordem')->default(0);
            $table->timestamps();
        });

        // 4. Itens dos Guias (Passos)
        Schema::create('guia_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guia_id')->constrained('guias')->onDelete('cascade');
            $table->string('titulo_passo')->nullable(); // Ex: Passo 1
            $table->text('conteudo'); // Texto explicativo
            $table->text('codigo')->nullable(); // Snippet de código se houver
            $table->integer('ordem')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guia_itens');
        Schema::dropIfExists('guias');
        Schema::dropIfExists('comandos');
        Schema::dropIfExists('temas');
    }
};