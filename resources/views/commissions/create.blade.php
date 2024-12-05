@extends('layouts.app')

@section('content')
<h1 class="mb-4">Adicionar Comissão</h1>

<form action="{{ route('commissions.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="affiliate_id" class="form-label">Afiliado</label>
        <select class="form-select" id="affiliate_id" name="affiliate_id" required>
            <option value="">Selecione um afiliado</option>
            @foreach ($affiliates as $affiliate)
            <option value="{{ $affiliate->id }}">{{ $affiliate->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
    </div>
    <div class="mb-3">
        <label for="data" class="form-label">Data</label>
        <input type="date" class="form-control" id="data" name="data" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection
