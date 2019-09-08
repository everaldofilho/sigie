<?php

namespace App\Business;

use Illuminate\Support\Facades\DB;

class UltimosAlunos
{
    public function cadastrado()
    {
        $query = $this->buildBase();
        $query->addSelect('ac.dt_inicio as data');
        $query->where('ac.status', 1);
        return $query->get();
    }

    public function cancelado()
    {
        $query = $this->buildBase();
        $query->addSelect('ac.dt_cancelamento as data');
        $query->where('ac.status', 0);
        return $query->get();
    }

    public function terminado()
    {
        $query = $this->buildBase();
        $query->addSelect('ac.dt_termino as data');
        $query->where('ac.status', 2);
        return $query->get();
    }

    private function buildBase()
    {
        $query = DB::table('aluno_curso as ac');
        $query->join('aluno as a', 'a.id', 'ac.id_aluno');
        $query->join('curso as c', 'c.id', 'ac.id_curso');

        $query->addSelect('ac.id_aluno');
        $query->addSelect('a.nome');
        $query->addSelect('c.nome as curso');

        $query->orderByDesc(DB::raw('data'));
        $query->orderByDesc('ac.id');
        $query->where('c.id_instituicao', session()->get('instituicao'));
        $query->limit(3);
        return $query;
    }
}
