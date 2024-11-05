@extends('templates.template')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ isset($salas->id) ? 'Editar Sala' : 'Criar Sala' }}</title>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">{{ isset($salas->id) ? 'Editar Sala' : 'Criar Nova Sala' }}</h1>

    <form action="{{ isset($salas->id) ? route('salas.update', $salas->id) : route('salas.store') }}" method="POST" class="p-4 border rounded shadow">
        @csrf
        @if(isset($salas->id))
            @method('PUT')
        @endif
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $salas->nome) }}" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">{{ isset($salas->id) ? 'Atualizar' : 'Salvar' }}</button>
            <a href="{{ route('salas.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection