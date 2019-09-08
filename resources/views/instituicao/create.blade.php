@extends('layouts.master')
@section('title')
<i class="fas fa-university mr-1"></i> Instituições / <small class="ml-1"> Novo instituicao</small>
@endsection
@section('botao')
<a href="{{ route('instituicao.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <span class="icon">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Voltar</span>
</a>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Nova instituição</h6>
    </div>
    <form action="{{ route('instituicao.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <span>Nome</span>
                        <input type="text" class="form-control" name="nome" value="{{ $instituicao->nome }}" maxlength="80" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <span>CNPJ</span>
                        <input type="text" class="form-control" name="cnpj" value="{{ $instituicao->cnpj }}"  data-inputmask="'mask': '99.999.999/9999-99'" maxlength="35" required>
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