@extends('templates.template')

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do estudante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                Detalhes do estudante {{ $estudante->nome }}
            </div>
            <div class="card-body">
                <p><Strong>ID:</Strong> {{ $estudante->id }} </p>
                <p><Strong>Nome:</Strong> {{ $estudante->nome }} </p>
                <p><strong>CPF:</strong> {{ preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $estudante->cpf) }} </p>
                <p><Strong>Data Nascimento:</Strong> {{ $estudante->nascimento }} </p>
                <br>
                <a class="btn btn-success" href="{{ route('estudantes.index') }}">Voltar</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

@endsection