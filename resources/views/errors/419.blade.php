@extends('layouts.master')

@section('title', '419 - Token expirado')

@section('content')
<div class="text-center">
    <div class="error mx-auto" data-text="404">419</div>
    <p class="lead text-gray-800 mb-5">Seu token expirou!</p>
    <p class="text-gray-500 mb-0">Clique no botão abaixo para voltar para pagina inicial</p>
    <a href="{{route('home')}}">Home</a>
</div>
@endsection