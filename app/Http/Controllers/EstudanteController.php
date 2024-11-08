<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudantes;
use App\Models\Salas;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salas = Salas::all();
        $estudantes = Estudantes::all();
        return view('index', compact('estudantes', 'salas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salas = Salas::all();
        return view('EstudantesCreate', ['estudante' => new Estudantes(), 'salas' => $salas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string',
            'nascimento' => 'required|date',
            'sala_id' => 'required|exists:salas,id',
        ]);
    
        $estudante = Estudantes::where('cpf', $validated['cpf'])->first();
    
        if ($estudante) {

            $estudante->update($validated);
            return redirect()->route('estudantes.index')->with('success', 'Estudante atualizado com sucesso!');
        } else {
            Estudantes::create($validated);
            return redirect()->route('estudantes.index')->with('success', 'Estudante criado com sucesso!');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estudante = Estudantes::with('sala')->find($id); 
        return view('estudante.show', compact('estudante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salas = Salas::all();
        $estudante = Estudantes::find($id);
    
        if (!$estudante) {
            return redirect()->route('estudantes.index')->with('error', 'Estudante não encontrado');
        }
    
        return view('create', ['estudante' => $estudante, 'salas' => $salas]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string',
            'nascimento' => 'required|date',
            'sala_id' => 'required|exists:salas,id',
        ]);
    
        $estudante = Estudantes::find($id);
    
        if ($estudante) {
            $estudante->update($validated);
            return redirect()->route('estudantes.index')->with('success', 'Estudante atualizado com sucesso!');
        } else {
            return redirect()->route('estudantes.index')->with('error', 'Estudante não encontrado');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudante = Estudantes::find($id);

        if ($estudante) {
            $estudante->delete();
            return redirect()->route('estudantes.index')->with('success', 'Estudante excluído com sucesso!');
        } else {
            return redirect()->route('estudantes.index')->with('error', 'Estudante não encontrado');
        }
    }
}