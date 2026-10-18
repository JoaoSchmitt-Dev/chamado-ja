<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitante_id')->constrained('usuarios');
            $table->foreignId('tecnico_id')->nullable()->constrained('usuarios');
            $table->foreignId('categoria_id')->constrained('categorias');

            $table->string('titulo', 200);
            $table->text('descricao');

            $table->enum('prioridade', ['baixa', 'media', 'alta', 'critica'])->default('media');
            $table->enum('status', ['aberto', 'em_atendimento', 'aguardando', 'resolvido', 'fechado'])->default('aberto');

            $table->timestamps();

            $table->index('solicitante_id', 'idx_chamados_solicitante_id');
            $table->index('tecnico_id', 'idx_chamados_tecnico_id');
            $table->index('categoria_id', 'idx_chamados_categoria_id');
            $table->index('status', 'idx_chamados_status');
            $table->index('prioridade', 'idx_chamados_prioridade');
            $table->index('created_at', 'idx_chamados_created_at');

            $table->index(
                ['status', 'prioridade'],
                'idx_chamados_status_prioridade'
            );

            $table->index(
                ['tecnico_id', 'status'],
                'idx_chamados_tecnico_status'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
