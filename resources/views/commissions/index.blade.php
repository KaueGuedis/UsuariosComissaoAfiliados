@extends('layouts.app')

@section('content')
<h1 class="mb-4">Comissões</h1>
<a href="{{ route('commissions.create') }}" class="btn btn-primary mb-3">Adicionar Comissão</a>

<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Afiliado</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($commissions as $commission)
        <tr>
            <td>{{ $commission->id }}</td>
            <td>{{ $commission->affiliate->name }}</td>
            <td>{{ $commission->valor }}</td>
            <td>{{ date("d/m/Y", strtotime($commission->data)) }}</td>
            <td>
                <a href="{{ route('commissions.edit', $commission->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('commissions.destroy', $commission->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir esta comissão?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
