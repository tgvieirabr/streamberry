<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacoesController extends Controller
{
    public function index()
    {
        $avaliacoes = Avaliacao::with('filme', 'usuario')->paginate(10);
        return response()->json($avaliacoes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'string|nullable',
            'filme_id' => 'required|exists:filmes,id',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        $avaliacao = Avaliacao::create($validatedData);
        return response()->json($avaliacao, 201);
    }

    public function show($id)
    {
        $avaliacao = Avaliacao::with('filme', 'usuario')->findOrFail($id);
        return response()->json($avaliacao);
    }

    public function destroy($id)
    {
        Avaliacao::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
