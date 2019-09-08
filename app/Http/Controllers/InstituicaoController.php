<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstituicaoController extends Controller
{
    public function index()
    {
        $instituicao = new Instituicao();
        $instituicoes = $instituicao->withTotais()->paginate();
        return view('instituicao.index', ['instituicoes' => $instituicoes]);
    }

    public function create()
    {
        $instituicao = new Instituicao();
        return view('instituicao.create', ['instituicao' => $instituicao]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:80',
            'cnpj' => 'required|max:20',
        ]);
        
        $validator->after(function ($validator) use ($request) {
            if (Instituicao::where('cnpj', Util::somenteNumero($request->get('cnpj')))->get()->count()) {
                $validator->errors()->add('cnpj', 'Já existe um cadastro com este CNPJ');
            }
        });
        $validator->validate();

        $instituicao = new Instituicao();
        $instituicao->nome = $request->get('nome');
        $instituicao->cnpj = Util::somenteNumero($request->get('cnpj'));
        $instituicao->status = 1;
        $instituicao->save();

        session()->flash('success', 'Instituição cadastrada com sucesso!');

        return redirect()->route('instituicao.edit', [$instituicao->id]);
    }


    public function edit(Instituicao $instituicao)
    {
        return view('instituicao.edit', ['instituicao' => $instituicao]);
    }

    
    public function update(Request $request, Instituicao $instituicao)
    {
        Validator::make($request->all(), [
            'nome' => 'required|max:80',
            'cnpj' => 'required|max:20',
        ])->validate();
        $instituicao->nome = $request->get('nome');
        $instituicao->cnpj = Util::somenteNumero($request->get('cnpj'));
        $instituicao->status = $request->get('status');
        $instituicao->save();
        session()->flash('success', 'Instituição atualizada com sucesso!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instituicao $instituicao)
    {
        $instituicao->delete();
        
        if ($instituicao->cursos()->get()->count()) {
            session()->flash('success', 'Instituição foi inativado com sucesso!');
        } else {
            session()->flash('success', 'Instituição foi excluido com sucesso!');
        }

        return redirect()->route('curso.index');
    }
}
