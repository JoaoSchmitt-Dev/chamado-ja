<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chamado_id')->constrained('chamados')->cascadeOnDelete();
            $table->foreignId('usuario_id')->constrained('usuarios');

            $table->text('conteudo');

            $table->timestamps();

            $table->index('chamado_id');
            $table->index('usuario_id');

            $table->index(
                'chamado_id',
                'idx_comentarios_chamado_id'
            );

            $table->index(
                'usuario_id',
                'idx_comentarios_usuario_id'
            );

            $table->index(
                ['chamado_id', 'created_at'],
                'idx_comentarios_chamado_created_at'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
