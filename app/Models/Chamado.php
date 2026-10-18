<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chamado extends Model
{
    protected $table = 'chamados';

    protected $fillable = [
        'solicitante_id',
        'tecnico_id',
        'categoria_id',
        'titulo',
        'descricao',
        'prioridade',
        'status',
    ];

    public function solicitante(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'solicitante_id');
    }

    public function tecnico(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'tecnico_id');
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'chamado_id');
    }

    public function historicoStatus(): HasMany
    {
        return $this->hasMany(HistoricoStatus::class, 'chamado_id');
    }
}