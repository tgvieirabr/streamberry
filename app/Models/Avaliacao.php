<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = ['nota', 'comentario', 'filme_id'];
    
    public function filme() {
        return $this->belongsTo(Filme::class);
    }
    
    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }

    
}
