<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guia extends Model
{
    protected $fillable = ['titulo', 'subtitulo', 'icone', 'classe_cor', 'layout', 'ordem'];

    public function itens(): HasMany
    {
        return $this->hasMany(GuiaItem::class)->orderBy('ordem');
    }
}