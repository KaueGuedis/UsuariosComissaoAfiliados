@extends('layouts.app')

@section('content')
<h1 class="mb-4">Afiliados</h1>
<a href="{{ route('affiliates.create') }}" class="btn btn-primary mb-3">Adicionar Afiliado</a>

<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($affiliates as $affiliate)
        <tr>
            <td>{{ $affiliate->id }}</td>
            <td>{{ $affiliate->name }}</td>
            <td>{{ $affiliate->cpf }}</td>
            <td>{{ $affiliate->email }}</td>
            <td>{{ $affiliate->estado }}</td>
            <td>{{ $affiliate->cidade }}</td>
            <td>
                <a href="{{ route('affiliates.edit', $affiliate->id) }}" class="btn btn-sm btn-warning">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
