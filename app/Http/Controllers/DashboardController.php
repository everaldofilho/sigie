<?php

namespace App\Http\Controllers;

use App\Business\UltimosAlunos;
use App\Models\Curso;
use App\Models\Instituicao;

class DashboardController extends Controller
{
    public function index()
    {
        $instituicao = new Instituicao();
        $instituicao = $instituicao->withTotais()->find(session()->get('instituicao'));

        $dados = new UltimosAlunos();
        $data[] = ['title' => 'Ultimos cancelados', 'itens' => $dados->cancelado()];
        $data[] = ['title' => 'Ultimos Concluidos', 'itens' => $dados->terminado()];
        $data[] = ['title' => 'Ultimos cadastrados', 'itens' => $dados->cadastrado()];

        $curso = new Curso;
        $cursos = $curso->totais()->where('id_instituicao', $instituicao->id)->get();

        return view('welcome', [
            'instituicao' => $instituicao,
            'ultimos' =>  $data,
            'cursos' => $cursos
        ]);
    }
}
