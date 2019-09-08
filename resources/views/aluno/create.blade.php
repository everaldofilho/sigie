@extends('layouts.master')
@section('title')
<i class="fas fa-users mr-1"></i> Aluno / <small class="ml-1"> Novo aluno</small>
@endsection

@section('botao')
<a href="{{ route('aluno.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <span class="icon">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Voltar</span>
</a>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Novo aluno</h6>
    </div>
    <form action="{{ route('aluno.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <span>Curso</span>
                        <select class="custom-select" name="id_curso" required>
                            @foreach($cursos as $curso)
                            <option value="{{$curso->id}}">{{$curso->nome}} ({{$curso->duracao}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <span>Nome</span>
                        <input type="text" class="form-control" name="nome" value="{{ $aluno->nome }}" maxlength="80" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <span>Data de nascimento</span>
                        <input type="date" class="form-control" name="data_nascimento" value="{{ $aluno->data_nascimento }}" maxlength="35" required>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <span>CPF</span>
                        <input type="text" class="form-control" name="cpf" value="{{ $aluno->cpf }}" data-inputmask="'mask': '999.999.999-99'" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <span>Celular</span>
                        <input type="text" class="form-control" name="celular" value="{{ $aluno->celular }}" data-inputmask="'mask': '(99) 99999-9999'" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <span>Email</span>
                        <input type="email" class="form-control" name="email" value="{{ $aluno->email }}" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <span>CEP</span>
                        <input type="text" class="form-control" name="cep" value="{{ $aluno->cep }}" data-inputmask="'mask': '99999-999'">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <span>UF</span>
                        <input type="text" class="form-control" name="uf" value="{{ $aluno->uf }}" maxlength='2'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <span>Cidade</span>
                        <input type="text" class="form-control" name="cidade" value="{{ $aluno->cidade }}" maxlength='60'>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <span>Bairro</span>
                        <input type="text" class="form-control" name="bairro" value="{{ $aluno->bairro }}" maxlength='60'>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Endereço</span>
                        <input type="text" class="form-control" name="endereco" value="{{ $aluno->endereco}}" maxlength='80'>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <span>Numero</span>
                        <input type="text" class="form-control" name="numero" value="{{ $aluno->numero }}" maxlength="4">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success btn-icon-split btn-sm">
                <span class="icon">
                    <i class="fas fa-save"></i>
                </span>
                <span class="text">Salvar cadastro</span>
            </button>
        </div>
    </form>
</div>
@endsection