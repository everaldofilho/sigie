@extends('layouts.master')

@section('title')
<i class="fas fa-university mr-1"></i> Instituição / <small class="ml-1">todos os cadastros</small>
@endsection

@section('botao')
<a href="{{ route('instituicao.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <span class="icon">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Novo cadastrado</span>
</a>
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="table-responsive">
        <table class="table table-striped table-bordared table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th class="text-center">CNPJ</th>
                    <th class="text-center table-dark">Alunos</th>
                    <th class="text-center">Situação</th>
                    <th class="text-center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instituicoes as $instituicao)
                <tr>
                    <td>{{ $instituicao->id }}</td>
                    <td>{{ $instituicao->nome }}</td>
                    <td class="text-center">{{ $instituicao->cnpj }}</td>
                    <td class="text-center">{{ $instituicao->alunos_count }}</td>
                    <td class="text-center">{{ $instituicao->status ? 'Ativo' : 'Inativo' }}</td>
                    <td class="text-right">
                        <form action="{{ route('instituicao.destroy', $instituicao->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <a href="{{ route('instituicao.edit', $instituicao->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pencil-alt"></i> Editar/Visualizar
                            </a>
                            @if(!$instituicao->alunos_count)
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-times"></i> Excluir
                            </button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer">
            {{ $instituicoes->links() }}
        </div>
    </div>
</div>
@endsection