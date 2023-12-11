<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'nome' => 'João Silva',
            'email' => 'joao@example.com',
      
        ]);

        Usuario::create([
            'nome' => 'Maria Souza',
            'email' => 'maria@example.com',
     
        ]);

   
    }
}