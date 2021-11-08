@extends('adminlte::page')

@section('title', 'Detalhes do Cliente')

@section('content_header')
    <h1>Detalhes do Cliente <b>{{ $cliente->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Telefone: </strong> {{ $cliente->telephone }}
                </li>
                <li>
                    <strong>Número do Cartão: </strong> {{ $cliente->cc_id }}
                </li>
                <li>
                    <strong>Número da Conta: </strong> {{ $cliente->iban }}
                </li>
                <li>
                    <strong>Saldo Devedor: </strong> R$ {{ $cliente->debit_balance }}
                </li>
            </ul>
            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Apagar</button>
            </form>
        </div>
    </div>
@stop
