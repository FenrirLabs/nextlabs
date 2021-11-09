@extends('adminlte::page')

@section('title', 'Edição de Cliente')

@section('content_header')
    <h1>Alterar Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('clientes.update') }}" class="form" method="POST">
                @csrf
                <input type="hidden" name="cliente_id" value="{{ $cliente->id }}"/>
                <div class="form-group">
                    <label>Nome do Cliente:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome completo" value="{{ $cliente->name }}">
                </div>
                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="text" name="telephone" class="form-control" placeholder="+55 55 999999999" value="{{ $cliente->telephone }}">
                </div>
                <div class="form-group">
                    <label>Número do Cartão:</label>
                    <input type="text" name="cc_id" class="form-control" placeholder="5555 5555 55555 5555 55 55" value="{{ $cliente->cc_id }}">
                </div>
                <div class="form-group">
                    <label>Número da Conta:</label>
                    <input type="text" name="iban" class="form-control" placeholder="35220 665 26665525" value="{{ $cliente->iban }}">
                </div>
                <div class="form-group">
                    <label>Saldo Devedor:</label>
                    <input type="text" name="debit_balance" class="form-control" placeholder="30.000.00" value="{{ $cliente->debit_balance }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Alterar</button>
                </div>
            </form>
        </div>
    </div>
@stop
