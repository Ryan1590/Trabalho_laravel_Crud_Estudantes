<?php

namespace App\Http\Controllers;
use App\Models\Salas;

use Illuminate\Http\Request;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salas = Salas::All();
        return view('salas', compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        return view('SalasCreate',  ['salas' => new Salas()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);
    
        $salas = Salas::where('nome', $validated['nome'])->first();
    
        if ($salas) {
            $salas->update($validated);
            return redirect()->route('salas.index')->with('success', 'Sala atualizada com sucesso!');
        } else {
            Salas::create($validated);
            return redirect()->route('salas.index')->with('success', 'Sala criada com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salas = Salas::find($id);
        
        if (!$salas) {
            return redirect()->route('salas.index')->with('error', 'Estudante não encontrado');
        }

        return view('SalasCreate', ['salas' => $salas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $salas = Salas::find($id);

        if ($salas) {
            $salas->update($validated);
            return redirect()->route('salas.index')->with('success', 'Estudante atualizado com sucesso!');
        } else {
            return redirect()->route('salas.index')->with('error', 'Estudante não encontrado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $salas = Salas::find($id);

        if ($salas) {
            $salas->delete();
            return redirect()->route('salas.index')->with('success', 'Sala excluída com sucesso!');
        } else {
            return redirect()->route('salas.index')->with('error', 'Sala não encontrada');
        }
    
    }
}
