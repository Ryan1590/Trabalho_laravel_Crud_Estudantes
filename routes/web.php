<?php


use App\Http\Controllers\EstudanteController;
use Illuminate\Support\Facades\Route;

// Rotas para o recurso "estudantes"
Route::get('/', [EstudanteController::class, 'index'])->name('estudantes.index');

// Rotas para criar um novo estudante
Route::get('estudantes/create', [EstudanteController::class, 'create'])->name('estudantes.create');
Route::post('estudantes', [EstudanteController::class, 'store'])->name('estudantes.store');

// Rota para visualizar um estudante específico
Route::get('estudantes/{id}', [EstudanteController::class, 'show'])->name('estudante.show');


// Rotas para editar um estudante
Route::get('estudantes/{id}/edit', [EstudanteController::class, 'edit'])->name('estudantes.edit');
Route::put('estudantes/{id}', [EstudanteController::class, 'update'])->name('estudantes.update');

// Rota para excluir um estudante
Route::delete('estudantes/{id}', [EstudanteController::class, 'destroy'])->name('estudantes.destroy');
