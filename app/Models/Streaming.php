<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streaming extends Model
{
    use HasFactory;

    public function filmes() {
        return $this->belongsToMany(Filme::class, 'filme_streaming');
    }
    

}
