<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function instituicao(Request $request)
    {
        $id = $request->get('id');
        $instituicao = Instituicao::find($id);
        if ($instituicao) {
            $request->session()->put('instituicao', $instituicao->id);
            session()->flash('info', "Instituicação trocada com sucesso");
        }

        return redirect()->back();
    }
}
