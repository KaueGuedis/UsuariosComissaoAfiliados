@extends('layouts.app')

@section('content')
<h1 class="mb-4">Usuários</h1>
<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Adicionar Usuário</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->active ? 'Ativo' : 'Inativo' }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                @if($user->active)
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja inativar este usuário?')">Inativar</button>
                    </form>
                @else
                    <form action="{{ route('users.activate', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        <button class="btn btn-sm btn-success" onclick="return confirm('Deseja ativar este usuário?')">Ativar</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection