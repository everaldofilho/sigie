<?php

namespace App\Business;

use App\Models\AlunoCurso;

class SearchAlunoCurso
{
    private $id_aluno;
    private $query;

    public function __construct($id)
    {
        $this->id_aluno = $id;
    }

    public function build()
    {
        $this->buildQuery();
        $this->buildWhere();

        return $this->query;
    }

    protected function buildWhere()
    {
        if ($this->id_aluno) {
            $this->query->where('ac.id_aluno', $this->id_aluno);
        }
    }

    protected function buildQuery()
    {
        $this->query = AlunoCurso::query();
        $this->query->from('aluno_curso as ac');
        $this->query->select('ac.*');
        $this->query->addSelect('c.nome as curso');
        $this->query->addSelect('i.nome as instituicao');
        $this->query->join('curso as c', 'c.id', 'ac.id_curso');
        $this->query->join('instituicao as i', 'i.id', 'c.id_instituicao');
    }
}
