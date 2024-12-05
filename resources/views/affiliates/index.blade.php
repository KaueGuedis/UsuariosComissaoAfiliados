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
            <th>Status</th>
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
            <td>{{ $affiliate->active ? 'Ativo' : 'Inativo' }}</td>
            <td>
                <a href="{{ route('affiliates.edit', $affiliate->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('affiliates.destroy', $affiliate->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja inativar este afiliado?')">Inativar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
