@extends('layouts.master')

@section('title')
<i class="fas fa-tachometer-alt mr-1"></i> Dashboard / <small class="ml-1"> {{$instituicao->nome}}</small>
@endsection
@section('content')
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Alunos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$instituicao->alunos_count}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cursos em andamento</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $instituicao->alunos_ativos_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Cursos cancelados</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $instituicao->alunos_cancelado_count }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-times fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Cursos finalizados</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $instituicao->alunos_aprovado_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cursos / Alunos</h6>
            </div>
            <div class="card-body">
                @if(!$cursos->count())
                <h3 class="text-center">Nenhum curso cadastrado ativo para essa instituição</h3>
                @endif
                @foreach($cursos as $curso)
                <h4 class="small font-weight-bold">{{$curso->nome}} <span class="float-right">{{$curso->alunos_count}}</span></h4>
                <div class="progress mb-4">
                    @if($curso->alunos_aprovado_count)
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{($curso->alunos_aprovado_count/ $instituicao->alunos_count) * 100}}%">
                        {{$curso->alunos_aprovado_count}} Finalizados
                    </div>
                    @endif
                    @if($curso->alunos_cancelado_count)
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{($curso->alunos_cancelado_count/ $instituicao->alunos_count) * 100}}%">
                        {{$curso->alunos_cancelado_count}} Cancelados
                    </div>
                    @endif
                    @if($curso->alunos_ativos_count)
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{($curso->alunos_ativos_count/ $instituicao->alunos_count) * 100}}%">
                        {{$curso->alunos_ativos_count}} Em andamento
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        @foreach ($ultimos as $ultimo)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$ultimo['title']}}</h6>
            </div>
            <table class="table table-striped table-hover table-sm mb-0">
                <thead>
                    <tr>
                        <th>Aluno</th>
                        <th>Curso</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ultimo['itens'] as $item)
                    <tr>
                        <td><a href="{{ route('aluno.edit', [$item->id_aluno]) }}">{{$item->nome}}</a></td>
                        <td>{{$item->curso}}</td>
                        <td>{{$item->data}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
</div>
@endsection