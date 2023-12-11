<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filme;

class FilmeSeeder extends Seeder
{
    public function run()
    {
        Filme::create([
            'titulo' => 'O Poderoso Chefão',
            'genero_id' => 1, 
            'ano_lancamento' => 1972,
       
        ]);

    
    }
}
