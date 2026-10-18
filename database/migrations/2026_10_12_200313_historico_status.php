<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('historico_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chamado_id')->constrained('chamados')->cascadeOnDelete();
            $table->foreignId('usuario_id')->constrained('usuarios');

            $table->enum('status_anterior', [
                'aberto',
                'em_atendimento',
                'aguardando',
                'resolvido',
                'fechado'
            ])->nullable();
            $table->enum('status_novo', [
                'aberto',
                'em_atendimento',
                'aguardando',
                'resolvido',
                'fechado'
            ]);

            $table->timestamp('alterado_em')->useCurrent();

            $table->index(
                'chamado_id',
                'idx_historico_status_chamado_id'
            );

            $table->index(
                'usuario_id',
                'idx_historico_status_usuario_id'
            );

            $table->index(
                'status_novo',
                'idx_historico_status_status_novo'
            );

            $table->index(
                ['chamado_id', 'alterado_em'],
                'idx_historico_status_chamado_alterado_em'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historico_status');
    }
};
