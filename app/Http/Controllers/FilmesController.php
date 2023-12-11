<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index()
    {
        // Realize a consulta com paginação
        $filmesPaginados = Filme::with(['genero', 'streamings', 'avaliacoes'])->paginate(10);
    
        // Transforme cada item da coleção paginada
        $filmesTransformados = $filmesPaginados->getCollection()->map(function ($filme) {
            return [
                'id' => $filme->id,
                'nome' => $filme->titulo,
                'genero_id' => $filme->genero_id,
                'ano_lancamento' => $filme->ano_lancamento,
                'media_avaliacao' => $filme->avaliacoes->avg('nota'),
                'quantidade_streamings' => $filme->streamings->count(),
                'comentarios' => $filme->avaliacoes->pluck('comentario')
            ];
        });
    
        // Atualize a coleção original na resposta paginada
        $filmesPaginados->setCollection($filmesTransformados);
    
        return response()->json($filmesPaginados);
    }
    

    public function store(Request $request)
    {
        $filme = Filme::create($request->all());
        return response()->json($filme, 201);
    }

    public function show($id)
    {
        $filme = Filme::findOrFail($id);
        return response()->json($filme);
    }

    public function update(Request $request, $id)
    {
        $filme = Filme::findOrFail($id);
        $filme->update($request->all());
        return response()->json($filme);
    }

    public function destroy($id)
    {
        Filme::destroy($id);
        return response()->json(null, 204);
    }
}

