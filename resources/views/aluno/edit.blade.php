@extends('layouts.master')
@section('title')
<i class="fas fa-users mr-1"></i> Alunos / <small class="ml-1">{{$aluno->id}} - {{$aluno->nome}}</small>
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
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dados Cadastrais</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="cursos-tab" data-toggle="tab" href="#cursos" role="tab" aria-controls="cursos" aria-selected="false">Cursos</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="card shadow mb-1">
            <form action="{{ route('aluno.update', $aluno->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <span>Nome</span>
                                <input type="text" class="form-control" name="nome" value="{{ $aluno->nome }}" maxlength="80" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <span>Data de nascimento</span>
                                <input type="date" class="form-control" name="data_nascimento" value="{{ $aluno->data_nascimento->format('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <span>CPF</span>
                                <input type="text" class="form-control" name="cpf" value="{{ $aluno->cpf }}" data-inputmask="'mask': '999.999.999-99'" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <span>Celular</span>
                                <input type="text" class="form-control" name="celular" value="{{ $aluno->celular }}" data-inputmask="'mask': '(99) 99999-9999'" required>
                            </div>
                        </div>
                        <div class="col-md-7">
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
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <span>UF</span>
                                <input type="text" class="form-control" name="uf" value="{{ $aluno->uf }}" maxlength='2'>
                            </div>
                        </div>
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
                        <div class="col-md-5">
                            <div class="form-group">
                                <span>Endereço</span>
                                <input type="text" class="form-control" name="endereco" value="{{ $aluno->endereco}}" maxlength='80'>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <span>Nº</span>
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
                        <span class="text">Salvar alterações</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="cursos" role="tabpanel" aria-labelledby="cursos-tab">
        <div class="card shadow mb-1">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Instituição</th>
                        <th>Curso</th>
                        <th class="text-center">Inicio</th>
                        <th class="text-center">Conclusão</th>
                        <th class="text-center">Cancelamento</th>
                        <th class="text-center">Situação</th>
                        <th class="text-center">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cadastrarCurso">
                                <i class="fas fa-plus"></i>
                                Adicionar
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->instituicao }}</td>
                        <td>{{ $curso->curso }}</td>
                        <td>{{ $curso->dt_inicio->format('d/m/Y') }}</td>
                        <td>{{ !$curso->dt_termino ? $curso->dt_termino : $curso->dt_termino->format('d/m/Y') }}</td>
                        <td>{{ !$curso->dt_cancelamento ? $curso->dt_cancelamento : $curso->dt_cancelamento->format('d/m/Y') }}</td>
                        <td>
                            @if($curso->status == 0)
                            <span class="badge badge-danger"> Cancelado<span>
                            @elseif($curso->status == 1)
                            <span class="badge badge-info"> Em andamento<span>
                            @elseif($curso->status == 2)
                            <span class="badge badge-success"> Concluido<span>
                            @endif
                        </td>
                        <td class="text-right">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opções
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="{{ route('aluno.curso.ok', [$curso->id]) }}">Marca como concluido</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('aluno.curso.cancel', [$curso->id]) }}">Marca como cancelado</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Logout Modal-->
<div class="modal fade" id="cadastrarCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$aluno->nome}} / Novo Curso</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('aluno.curso.create', [$aluno->id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span>Selecione o curso</span>
                                    <select class="custom-select" name="id_curso" required>
                                        @foreach($cursosAtivos as $curso)
                                        <option value="{{$curso->id}}">
                                            {{$curso->nome}} ({{$curso->duracao}})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Adicionar curso</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection