@extends('layouts.master')

@section('title')
<i class="fas fa-book-reader mr-1"></i> Cursos / <small class="ml-1">todos os cadastros</small>
@endsection

@section('botao')
<a href="{{ route('curso.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                    <th class="text-center">Duração</th>
                    <th class="text-center table-dark">Alunos</th>
                    <th class="text-center">Situação</th>
                    <th class="text-center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nome }}</td>
                    <td class="text-center">{{ $curso->duracao }}</td>
                    <td class="text-center">{{ $curso->alunos_count }}</td>
                    <td class="text-center">{{ $curso->status ? 'Ativo' : 'Inativo' }}</td>
                    <td class="text-right">
                        <form action="{{ route('curso.destroy', $curso->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <a href="{{ route('curso.edit', $curso->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pencil-alt"></i> Editar/Visualizar
                            </a>
                            @if(!$curso->alunos_count)
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
            {{ $cursos->links() }}
        </div>
    </div>
</div>
@endsection