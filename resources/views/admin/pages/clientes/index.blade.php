@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes <a href="clientes/create" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Numero CC</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->name }}</td>
                            <td>{{ $cliente->telephone }}</td>
                            <td>{{ $cliente->cc_id }}</td>
                            <td style="width=10px;"><a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-warning">Ver</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $clientes->links() !!}
        </div>
    </div>
@stop
