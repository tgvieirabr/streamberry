<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    public function run()
    {
        Genero::create(['nome' => 'Drama']);
        Genero::create(['nome' => 'Ação']);
        Genero::create(['nome' => 'Comédia']);
    
    }
}
