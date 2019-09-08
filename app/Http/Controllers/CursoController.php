<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Instituicao;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $id = session()->get('instituicao');
        $curso = new Curso;
        $cursos = $curso->totais()->where('id_instituicao', $id)->paginate();
        return view('curso.index', ['cursos' => $cursos]);
    }

    public function create()
    {
        $curso = new Curso;
        $instituicoes = Instituicao::where('status', 1)->get();
        
        return view('curso.create', [
            'curso' => $curso,
            'instituicoes' => $instituicoes
        ]);
    }
    
    public function store(Request $request)
    {
        $curso = new Curso;
        $curso->nome = $request->get('nome');
        $curso->duracao = $request->get('duracao');
        $curso->id_instituicao = $request->get('id_instituicao');
        $curso->status = 1;
        $curso->save();
        session()->flash('success', "Curso cadastrado com sucesso!");
        return redirect()->route('curso.edit', [$curso->id]);
    }
    
    public function edit(Curso $curso)
    {
        $instituicoes = Instituicao::where('status', 1)->get();
        return view('curso.edit', ['curso'=> $curso, 'instituicoes' => $instituicoes]);
    }

    public function update(Request $request, Curso $curso)
    {
        $curso->nome = $request->get('nome');
        $curso->duracao = $request->get('duracao');
        $curso->id_instituicao = $request->get('id_instituicao');
        $curso->status = $request->get('status');
        $curso->save();
        session()->flash('success', 'Curso atualizado com sucesso!');
        return redirect()->back();
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        
        if ($curso->alunos()->get()->count()) {
            session()->flash('success', 'Curso foi inativado com sucesso!');
        } else {
            session()->flash('success', 'Curso foi excluido  com sucesso!');
        }

        return redirect()->route('curso.index');
    }
}
