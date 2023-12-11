<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Avaliacao;

class AvaliacaoSeeder extends Seeder
{
    public function run()
    {
        Avaliacao::create([
            'filme_id' => 1, 
            'usuario_id' => 1, 
            'nota' => 5,
            'comentario' => 'Excelente filme!'
        ]);

        Avaliacao::create([
            'filme_id' => 1,
            'usuario_id' => 2,
            'nota' => 4,
            'comentario' => 'Muito bom, mas um pouco longo.'
        ]);

  }
}
