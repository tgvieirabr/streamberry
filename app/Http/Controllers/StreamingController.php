<?php

namespace App\Http\Controllers;

use App\Models\Streaming;
use Illuminate\Http\Request;

class StreamingsController extends Controller
{
    public function index()
    {
        $streamings = Streaming::paginate(10);
        return response()->json($streamings);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Regras de validação para streaming
        ]);

        $streaming = Streaming::create($validatedData);
        return response()->json($streaming, 201);
    }

    public function show($id)
    {
        $streaming = Streaming::findOrFail($id);
        return response()->json($streaming);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Regras de validação para streaming
        ]);

        $streaming = Streaming::findOrFail($id);
        $streaming->update($validatedData);
        return response()->json($streaming);
    }

    public function destroy($id)
    {
        Streaming::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
