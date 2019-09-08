@extends('layouts.master')

@section('title')
<i class="fas fa-users mr-1"></i> Alunos / <small class="ml-1">todos os cadastros</small>
@endsection

@section('botao')
<a href="{{ route('aluno.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <span class="icon">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Novo cadastrado</span>
</a>
@endsection
@section('content')
<form>
    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Curso</span>
                </div>
                <select class="custom-select" name="curso" onchange="this.form.submit()">
                    <option value="">Todos os cursos</option>
                    @foreach($cursos as $curso)
                    <option value="{{$curso->id}}" {{ $curso->id == $id_curso ? 'selected' : '' }}>{{$curso->nome}} ({{$curso->alunos_count}} aluno(s))</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-8">
            <div class="input-group mb-3">
                <input type="search" name="q" autofocus class="form-control" value="{{ $search }}" placeholder="Pesquise por nome, email, cpf ou telefone">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Pesquisar</button>
                </div>
            </div>
        </div>
    </div>
</form>
@if(!$alunos->count() && strlen($search) <= 0) <div class="jumbotron text-center">
    <h1 class="display-4">Ola, identificamos que você não possui nenhum aluno.</h1>
    <p class="lead">Clique no botão abaixo para incluir seu primeiro aluno.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('aluno.create') }}" role="button">Cadastrar</a>
    </div>
    @endif
    @if($alunos->count() || strlen($search) > 0)
    <div class="card shadow mb-4">
        <div class="table-responsive">
            <table class="table table-striped table-bordared table-hover table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data de nascimento</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th class="text-center">Curso</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->id }}</td>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->data_nascimento->format('d/m/Y') }}</td>
                        <td>{{ App\Util::mask($aluno->cpf, "###.###.###-##") }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td class="text-center">{{ $aluno->curso_count }}</td>
                        <td class="text-right">
                            <a href="{{ route('aluno.edit', $aluno->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-user-edit"></i> Editar/Visualizar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {{ $alunos->links() }}
            </div>
        </div>
    </div>
    @endif
    @endsection