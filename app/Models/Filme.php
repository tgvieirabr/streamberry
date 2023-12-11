<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

   
    protected $fillable = ['name', 'genero_id', 'ano_lancamento', /* outros campos */];


    public function genero() {
        return $this->belongsToMany(Genero::class);
    }

    // Função para definir o relacionamento muitos-para-muitos com Streaming
    public function streamings() {
        return $this->belongsToMany(Streaming::class, 'filme_streaming');
    }
    
}
