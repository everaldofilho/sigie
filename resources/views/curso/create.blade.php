@extends('layouts.master')
@section('title')
<i class="fas fa-book-reader mr-1"></i> Cursos / <small class="ml-1"> Novo curso</small>
@endsection
@section('botao')
<a href="{{ route('curso.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <span class="icon">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Voltar</span>
</a>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Novo curso</h6>
    </div>
    <form action="{{ route('curso.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <span>Instituição</span>
                        <select class="custom-select" name="id_instituicao" required>
                            @foreach($instituicoes as $instituicao)
                            <option value="{{$instituicao->id}}" {{ $instituicao->id == session()->get('instituicao') ? 'selected' : '' }}>
                                {{$instituicao->nome}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <span>Nome</span>
                        <input type="text" class="form-control" name="nome" value="{{ $curso->nome }}" maxlength="80" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <span>Duração</span>
                        <input type="text" class="form-control" name="duracao" value="{{ $curso->duracao }}" maxlength="35" required>
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