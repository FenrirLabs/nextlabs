@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    <h1>Cadastrar de Usuário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.store') }}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nome do Cliente:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome completo" required>
                </div>
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="text" name="email" class="form-control" placeholder="eu@meuprovedor.com" required>
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="password" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Conf. Senha:</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop
