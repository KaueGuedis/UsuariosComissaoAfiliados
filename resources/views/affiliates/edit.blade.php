@extends('layouts.app')

@section('content')
<h1 class="mb-4">Editar Afiliado</h1>

<form action="{{ route('affiliates.update', $affiliate->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $affiliate->name }}" required>
    </div>
    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $affiliate->cpf }}" required>
    </div>
    <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $affiliate->data_nascimento }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $affiliate->email }}" required>
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $affiliate->telefone }}" required>
    </div>
    <div class="mb-3">
        <label for="endereco" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $affiliate->endereco }}" required>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" id="estado" class="form-control" required>
            <option value=""></option>
        </select>
    </div>
    <div class="mb-3">
        <label for="cidade" class="form-label">Cidade</label>
        <select name="cidade" id="cidade" class="form-control" required>
            <option value=""></option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function () {
        // Carregar os estados ao carregar a página
        $.getJSON("https://servicodados.ibge.gov.br/api/v1/localidades/estados", function (data) {
            let stateOptions = '<option value="">Selecione um estado</option>';
            data.forEach(function (state) {
                stateOptions += `<option value="${state.sigla}">${state.nome}</option>`;
            });
            $('#estado').html(stateOptions);
        });

        // Carregar as cidades com base no estado selecionado
        $('#estado').on('change', function () {
            const stateCode = $(this).val();
            if (stateCode) {
                $.getJSON(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${stateCode}/municipios`, function (data) {
                    let cityOptions = '<option value="">Selecione uma cidade</option>';
                    data.forEach(function (city) {
                        cityOptions += `<option value="${city.nome}">${city.nome}</option>`;
                    });
                    $('#cidade').html(cityOptions);
                });
            } else {
                $('#cidade').html('<option value="">Selecione uma cidade</option>');
            }
        });
        $('#cpf').mask('00000000000', { reverse: true });
        $('#telefone').mask('00000000000', { reverse: true });
        $('#cidade').val({{ $affiliate->cidade }})
        $('#estado').val({{ $affiliate->estado }})
    });
</script>
