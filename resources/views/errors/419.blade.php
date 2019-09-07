@extends('layouts.master')

@section('title', '419 - Token expirado')

@section('content')
<div class="text-center">
    <div class="error mx-auto" data-text="404">419</div>
    <p class="lead text-gray-800 mb-5">Seu token expirou!</p>
    <p class="text-gray-500 mb-0">Clique no botão abaixo para ver a lista de clientes</p>
    <a href="{{route('clientes.index')}}">Clientes</a>
</div>
@endsection