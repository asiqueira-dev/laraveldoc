<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comando extends Model
{
    protected $fillable = ['tema_id', 'titulo', 'codigo', 'descricao', 'ordem'];

    public function tema(): BelongsTo
    {
        return $this->belongsTo(Tema::class);
    }
}