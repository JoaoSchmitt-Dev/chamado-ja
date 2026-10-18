<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Chamado;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuários solicitantes
        $solicitante1 = Usuario::create([
            'nome' => 'João Silva',
            'email' => 'joao@email.com',
            'senha' => Hash::make('123456'),
            'papel' => 'solicitante',
        ]);

        $solicitante2 = Usuario::create([
            'nome' => 'Maria Santos',
            'email' => 'maria@email.com',
            'senha' => Hash::make('123456'),
            'papel' => 'solicitante',
        ]);

        // Usuários técnicos
        $tecnico1 = Usuario::create([
            'nome' => 'Carlos Souza',
            'email' => 'carlos@email.com',
            'senha' => Hash::make('123456'),
            'papel' => 'tecnico',
        ]);

        $tecnico2 = Usuario::create([
            'nome' => 'Ana Oliveira',
            'email' => 'ana@email.com',
            'senha' => Hash::make('123456'),
            'papel' => 'tecnico',
        ]);

        // Categorias
        $categoriaSistema = Categoria::create([
            'nome' => 'Sistema',
            'descricao' => 'Problemas relacionados aos sistemas da empresa.',
        ]);

        $categoriaHardware = Categoria::create([
            'nome' => 'Hardware',
            'descricao' => 'Problemas relacionados a equipamentos.',
        ]);

        $categoriaRede = Categoria::create([
            'nome' => 'Rede',
            'descricao' => 'Problemas relacionados à rede e conexão.',
        ]);

        // Chamados
        Chamado::create([
            'solicitante_id' => $solicitante1->id,
            'tecnico_id' => $tecnico1->id,
            'categoria_id' => $categoriaSistema->id,
            'titulo' => 'Não consigo acessar o sistema',
            'descricao' => 'A mensagem de erro aparece depois do login.',
            'prioridade' => 'alta',
            'status' => 'em_atendimento',
        ]);

        Chamado::create([
            'solicitante_id' => $solicitante2->id,
            'tecnico_id' => $tecnico2->id,
            'categoria_id' => $categoriaHardware->id,
            'titulo' => 'Computador não liga',
            'descricao' => 'O computador não apresenta sinal ao pressionar o botão de ligar.',
            'prioridade' => 'critica',
            'status' => 'aberto',
        ]);

        Chamado::create([
            'solicitante_id' => $solicitante1->id,
            'tecnico_id' => null,
            'categoria_id' => $categoriaRede->id,
            'titulo' => 'Sem acesso à internet',
            'descricao' => 'O computador está conectado à rede, mas não possui acesso à internet.',
            'prioridade' => 'media',
            'status' => 'aberto',
        ]);

        Chamado::create([
            'solicitante_id' => $solicitante2->id,
            'tecnico_id' => $tecnico1->id,
            'categoria_id' => $categoriaSistema->id,
            'titulo' => 'Erro ao gerar relatório',
            'descricao' => 'O sistema apresenta erro ao tentar gerar o relatório mensal.',
            'prioridade' => 'baixa',
            'status' => 'aguardando',
        ]);
    }
}
