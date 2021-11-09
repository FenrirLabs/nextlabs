@extends('adminlte::page')

@section('title', 'Alteração de Usuário')

@section('content_header')
    <h1>Edição de Usuário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.update') }}" class="form" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}" />
                <div class="form-group">
                    <label>Nome do Cliente:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome completo" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="text" name="email" class="form-control" placeholder="eu@meuprovedor.com" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop
