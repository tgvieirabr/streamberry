<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    public function index()
    {
        $generos = Genero::paginate(10);
        return response()->json($generos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Regras de validação para gênero
        ]);

        $genero = Genero::create($validatedData);
        return response()->json($genero, 201);
    }

    public function show($id)
    {
        $genero = Genero::findOrFail($id);
        return response()->json($genero);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Regras de validação para gênero
        ]);

        $genero = Genero::findOrFail($id);
        $genero->update($validatedData);
        return response()->json($genero);
    }

    public function destroy($id)
    {
        Genero::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
