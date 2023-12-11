<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    // Relacionamento com Filme
    public function filmes() {
        return $this->hasMany(Filme::class);
    }
}
