<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuiaItem extends Model
{
    protected $table = 'guia_itens';
    protected $fillable = ['guia_id', 'titulo_passo', 'conteudo', 'codigo', 'ordem'];

    public function guia(): BelongsTo
    {
        return $this->belongsTo(Guia::class);
    }
}