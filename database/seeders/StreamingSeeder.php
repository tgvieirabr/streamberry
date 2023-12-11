<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Streaming;

class StreamingSeeder extends Seeder
{
    public function run()
    {
        Streaming::create(['nome' => 'Netflix']);
        Streaming::create(['nome' => 'Amazon Prime']);
        Streaming::create(['nome' => 'HBO Max']);
  
    }
}

