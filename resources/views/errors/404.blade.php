@extends('layouts.master')

@section('title', '404 - Pagina não encontrada')

@section('content')
<div class="text-center">
    <div class="error mx-auto" data-text="404">404</div>
    <p class="lead text-gray-800 mb-5">Pagina não encontrada</p>
    <p class="text-gray-500 mb-0">Clique no botão abaixo para voltar para pagina inicial</p>
    <a href="{{route('home')}}">Home</a>
</div>

@endsection