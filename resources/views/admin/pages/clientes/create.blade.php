@extends('adminlte::page')

@section('title', 'Cadastrar Novo Cliente')

@section('content_header')
    <h1>Cadastrar Novo Cliente</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('clientes.store') }}" class="form" method="POST">
            @csrf
            <div class="form-group">
                <label>Nome do Cliente:</label>
                <input type="text" name="name" class="form-control" placeholder="Nome completo">
            </div>
            <div class="form-group">
                <label>Telefone:</label>
                <input type="text" name="telephone" class="form-control" placeholder="+55 55 999999999">
            </div>
            <div class="form-group">
                <label>Número do Cartão:</label>
                <input type="text" name="cc_id" class="form-control" placeholder="5555 5555 55555 5555 55 55">
            </div>
            <div class="form-group">
                <label>Número da Conta:</label>
                <input type="text" name="iban" class="form-control" placeholder="35220 665 26665525">
            </div>
            <div class="form-group">
                <label>Saldo Devedor:</label>
                <input type="text" name="debit_balance" class="form-control" placeholder="30.000.00">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Salvar</button>
            </div>
        </form>
    </div>
</div>
@stop
