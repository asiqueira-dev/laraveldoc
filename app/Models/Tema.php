<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tema extends Model
{
    protected $fillable = ['titulo', 'icone', 'slug', 'ordem'];

    public function comandos(): HasMany
    {
        return $this->hasMany(Comando::class)->orderBy('ordem');
    }
}