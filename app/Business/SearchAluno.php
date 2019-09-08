<?php

namespace App\Business;

use App\Models\Aluno;

class SearchAluno
{
    protected $query;

    public $instituicao;
    public $curso;
    public $search;

    public function build()
    {
        $this->buildQuery();
        $this->buildWhere();
        return $this->query;
    }

    protected function buildQuery()
    {
        $this->query = Aluno::query();
        $this->query->select('t.*');
        $this->query->from('aluno as t');
        $this->query->join('aluno_curso as ac', 'ac.id_aluno', 't.id');
        $this->query->join('curso as c', 'c.id', 'ac.id_curso');
        $this->query->groupBy('t.id');
    }


    protected function buildWhere()
    {

        if ($this->search) {
            $search = $this->search;
            $this->query->where(function ($query) use ($search) {
                $query->orWhere('t.nome', 'like', "%{$search}%");
                $query->orWhere('t.cpf', 'like', "%{$search}%");
                $query->orWhere('t.email', 'like', "%{$search}%");
                $query->orWhere('t.celular', 'like', "%{$search}%");
                return $query;
            });
        }

        if ($this->curso) {
            $this->query->where('ac.id_curso', $this->curso);
        }

        if ($this->instituicao) {
            $this->query->where('c.id_instituicao', $this->instituicao);
        }
    }
}
