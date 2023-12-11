<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email'];

    // Relacionamento com Avaliação
    public function avaliacoes() {
        return $this->hasMany(Avaliacao::class);
    }


}
