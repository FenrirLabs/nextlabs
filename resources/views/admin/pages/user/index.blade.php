@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários <a href="/admin/usuarios/create" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="width=10px;">
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-warning">Ver</a>
                            &nbsp;
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
{{--            {!! $user->links() !!}--}}
        </div>
    </div>
@stop
