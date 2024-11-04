@extends('templates.template')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Página Inicial</title>
</head>
<body>

<div class="container mt-5">

    <h1>Lista de Estudantes</h1>

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('estudantes.create') }}" class="btn btn-primary">Criar Novo Estudante</a>
    </div>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>VISUALISAR</th>
                <th>Nascimento</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
        @foreach($estudantes as $estudante)
          <tr>
            <td>{{ $estudante->id }}</td>
            <td>{{ $estudante->nome }}</td>
            <td><a href="{{ route('estudante.show', $estudante) }}"><i class="fas fa-eye"></i></a></td>
            <td>{{ \Carbon\Carbon::parse($estudante->nascimento)->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('estudantes.edit', $estudante) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('estudantes.destroy', $estudante) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-delete">Excluir</button>
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script>
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const form = this.closest('form');
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter isso!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
@endsection