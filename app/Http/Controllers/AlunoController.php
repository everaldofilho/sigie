<?php

namespace App\Http\Controllers;

use App\Business\SearchAluno;
use App\Business\SearchAlunoCurso;
use App\Models\Aluno;
use App\Models\AlunoCurso;
use App\Models\Curso;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q', null);
        $id_curso = $request->get('curso', null);
        $instituicao = session()->get('instituicao');

        $searchAluno = new SearchAluno;
        $searchAluno->search = $search;
        $searchAluno->curso = $id_curso;
        $searchAluno->instituicao = $instituicao;

        $alunos = $searchAluno->build()
            ->withCount('curso')
            ->paginate()
            ->appends(['q' => $search, 'curso' => $id_curso]);
        $cursos = Curso::where('status', 1)->where('id_instituicao', $instituicao)->withCount('alunos')->get();

        return view('aluno.index', compact(['alunos', 'cursos', 'search', 'id_curso']));
    }

    public function create()
    {
        $aluno = new Aluno;
        $cursos = Curso::where('status', 1)
            ->where('id_instituicao', session()->get('instituicao'))
            ->withCount('alunos')->get();

        return view('aluno.create', compact(['aluno', 'cursos']));
    }

    public function store(Request $request)
    {
        $validator =  $this->requestValidate($request);
        $validator->after(function ($validator) use ($request) {
            if (Aluno::where('cpf', Util::somenteNumero($request->get('cpf')))->get()->count()) {
                $validator->errors()->add('cpf', 'Já existe um cadastro com este CPF');
            }
        });
        $validator->validate();

        $aluno = new Aluno;
        // Dados do aluno
        $aluno->nome = $request->get('nome');
        $aluno->cpf = Util::somenteNumero($request->get('cpf'));
        $aluno->data_nascimento = $request->get('data_nascimento');
        // Dados de contato
        $aluno->celular = Util::somenteNumero($request->get('celular'));
        $aluno->email = $request->get('email');
        // Dados de endereço
        $aluno->cep = Util::somenteNumero($request->get('cep'));
        $aluno->uf = $request->get('uf');
        $aluno->cidade = $request->get('cidade');
        $aluno->bairro = $request->get('bairro');
        $aluno->endereco = $request->get('endereco');
        $aluno->numero = $request->get('numero');
        $aluno->status = 1;
        $aluno->save();

        $alunoCurso = new AlunoCurso;
        $alunoCurso->id_curso = $request->get('id_curso');
        $alunoCurso->id_aluno = $aluno->id;
        $alunoCurso->dt_inicio = now();
        $alunoCurso->status = 1;
        $alunoCurso->save();

        session()->flash('success', 'Aluno cadastrado com sucesso');
        return redirect()->route('aluno.edit', [$aluno->id]);
    }

    public function edit(Aluno $aluno)
    {
        $searchCursos = new SearchAlunoCurso($aluno->id);
        $cursos = $searchCursos->build()->get();
        $cursosAtivos = Curso::where('status', 1)
            ->where('id_instituicao', session()->get('instituicao'))
            ->whereNotIn('id', $cursos->pluck('id_curso'))
            ->get();

        return view('aluno.edit', [
            'aluno' => $aluno,
            'cursos' => $cursos,
            'cursosAtivos' => $cursosAtivos
        ]);
    }

    public function update(Request $request, Aluno $aluno)
    {
        $this->requestValidate($request)->validate();

        // Dados do aluno
        $aluno->nome = $request->get('nome');
        $aluno->cpf = Util::somenteNumero($request->get('cpf'));
        $aluno->data_nascimento = $request->get('data_nascimento');
        // Dados de contato
        $aluno->celular = Util::somenteNumero($request->get('celular'));
        $aluno->email = $request->get('email');
        // Dados de endereço
        $aluno->cep = Util::somenteNumero($request->get('cep'));
        $aluno->uf = $request->get('uf');
        $aluno->cidade = $request->get('cidade');
        $aluno->bairro = $request->get('bairro');
        $aluno->endereco = $request->get('endereco');
        $aluno->numero = $request->get('numero');
        $aluno->save();

        session()->flash('success', 'Dados de cadastro do aluno atualizado com sucesso');
        return redirect()->back();
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->status = 0;
        $aluno->save();
    }

    public function requestValidate($request)
    {
        return Validator::make($request->all(), [
            'nome' => 'required|max:80',
            'cpf' => 'required|max:18',
            'celular' => 'required|max:15',
            'email' => 'required|email|max:45',
            'endereco' => 'required|max:80',
            'numero' => 'required|numeric',
            'bairro' => 'required|max:60',
            'cidade' => 'required|max:60',
            'uf' => 'required|max:2',
            'cep' => 'required|max:10',
        ]);
    }
}
