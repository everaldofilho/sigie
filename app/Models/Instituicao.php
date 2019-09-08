<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    public $table = 'instituicao';
    public $timestamps = false;

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'id_instituicao', 'id');
    }

    public function alunoCurso()
    {
        return $this->hasManyThrough(AlunoCurso::class, Curso::class, 'id_instituicao', 'id_curso', 'id', 'id');
    }

    public function withTotais()
    {
        return $this->withCount([
            'alunoCurso as alunos_count',
            'alunoCurso as alunos_aprovado_count' => function ($query) {
                $query->where('aluno_curso.status', 2);
            },
            'alunoCurso as alunos_ativos_count' => function ($query) {
                $query->where('aluno_curso.status', 1);
            },
            'alunoCurso as alunos_cancelado_count' => function ($query) {
                $query->where('aluno_curso.status', 0);
            }
        ]);
    }
    
    public function delete()
    {
        if ($this->cursos()->get()->count()) {
            $this->status = 0;
            $this->save();
        } else {
            parent::delete();
        }
    }
}
