<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'papel',
    ];

    protected $hidden = [
        'senha',
    ];

    public function chamadosComoSolicitante(): HasMany
    {
        return $this->hasMany(Chamado::class, 'solicitante_id');
    }

    public function chamadosComoTecnico(): HasMany
    {
        return $this->hasMany(Chamado::class, 'tecnico_id');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'usuario_id');
    }

    public function historicosStatus(): HasMany
    {
        return $this->hasMany(HistoricoStatus::class, 'usuario_id');
    }
}
