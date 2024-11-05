@extends('templates.template')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ isset($estudante->id) ? 'Editar Estudante' : 'Criar Estudante' }}</title>
</head>

<body>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cpfInput = document.getElementById('cpf');

            cpfInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 11) {
                    value = value.slice(0, 11);
                }
                if (value.length > 9) {
                    value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                } else if (value.length > 6) {
                    value = value.replace(/(\d{3})(\d{3})(\d{3})/, '$1.$2.$3');
                } else if (value.length > 3) {
                    value = value.replace(/(\d{3})(\d{3})/, '$1.$2');
                } else if (value.length > 0) {
                    value = value.replace(/(\d{3})/, '$1');
                }
                e.target.value = value;
            });
        });
    </script>

    <div class="container mt-5">
        <h1 class="text-center mb-4">{{ isset($estudante->id) ? 'Editar Estudante' : 'Criar Novo Estudante' }}</h1>

        <form action="{{ isset($estudante->id) ? route('estudantes.update', $estudante->id) : route('estudantes.store') }}" method="POST" class="p-4 border rounded shadow">
            @csrf
            @if(isset($estudante->id))
            @method('PUT')
            @endif

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $estudante->nome ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf', $estudante->cpf ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="nascimento" name="nascimento" value="{{ old('nascimento', $estudante->nascimento ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="sala_id" class="form-label">Sala</label>
                <select id="sala_id" name="sala_id" class="form-control" required>
                    <option value="" disabled {{ old('sala_id') ? '' : 'selected' }}>Selecione uma sala</option>
                    @foreach($salas as $sala)
                    <option value="{{ $sala->id }}" {{ (old('sala_id', $estudante->sala_id ?? '') == $sala->id) ? 'selected' : '' }}>
                        {{ $sala->nome }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">{{ isset($estudante->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a href="{{ route('estudantes.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection