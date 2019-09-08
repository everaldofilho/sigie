<?php

namespace App\Http\Controllers;

use App\Models\AlunoCurso;
use Illuminate\Http\Request;

class AlunoCursoController extends Controller
{
    
    public function cancel($curso)
    {
        $curso = AlunoCurso::find($curso);
        $curso->status = 0;
        $curso->dt_cancelamento = now();
        $curso->save();
        session()->flash('info', 'Curso cancelado com sucesso!');
        return redirect()->back();
    }

    public function ok($curso)
    {
        $curso = AlunoCurso::find($curso);
        $curso->status = 2;
        $curso->dt_termino = now();
        $curso->save();
        session()->flash('success', 'Curso concluido com sucesso!');
        return redirect()->back();
    }
    
    public function store(Request $request, $aluno)
    {
        $curso = new AlunoCurso();
        $curso->id_aluno = $aluno;
        $curso->id_curso = $request->get('id_curso');
        $curso->status = 1;
        $curso->dt_inicio = now();
        $curso->save();

        session()->flash('success', 'Curso adicionado ao aluno com sucesso!');

        return redirect()->back();
    }
}
