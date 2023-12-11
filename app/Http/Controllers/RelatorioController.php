<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;
use DB;

class RelatorioController extends Controller
{
    // Listar quantos filmes estão disponíveis em cada streaming
    public function filmesPorStreaming()
    {
        $relatorio = Filme::with('streamings')
                          ->get()
                          ->groupBy('streamings.nome') 
                          ->map(function ($item) {
                              return $item->count();
                          });

        return response()->json($relatorio);
    }

    // Calcular a média de avaliação de cada filme
    public function mediaAvaliacoes()
    {
        $relatorio = Filme::with('avaliacoes')
                          ->get()
                          ->mapWithKeys(function ($filme) {
                              return [$filme->titulo => $filme->avaliacoes->avg('nota')];
                          });

        return response()->json($relatorio);
    }

    // Listar filmes e quantos foram lançados em cada ano
    public function filmesPorAno()
    {
        $relatorio = Filme::select(DB::raw('count(*) as total'), 'ano_lancamento')
                          ->groupBy('ano_lancamento')
                          ->get();

        return response()->json($relatorio);
    }

    // Localizar filmes por avaliação e seus respectivos comentários
    public function filmesPorAvaliacao(Request $request)
    {
        $nota = $request->input('nota'); // Exemplo: /api/relatorios/filmes-por-avaliacao?nota=5

        $relatorio = Filme::whereHas('avaliacoes', function ($query) use ($nota) {
                              $query->where('nota', $nota);
                          })
                          ->with(['avaliacoes' => function ($query) use ($nota) {
                              $query->where('nota', $nota);
                          }])
                          ->get();

        return response()->json($relatorio);
    }

    // Média de avaliações de filmes agrupados por gênero e época de lançamento
    public function mediaPorGenero()
    {
        $relatorio = Filme::with('genero', 'avaliacoes')
                          ->get()
                          ->groupBy(['genero.nome', 'ano_lancamento'])
                          ->map(function ($filmes) {
                              return $filmes->avg('avaliacoes.nota');
                          });

        return response()->json($relatorio);
    }
}
