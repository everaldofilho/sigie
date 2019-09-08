<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public $table = 'curso';
    public $timestamps = false;

    public function alunos()
    {
        return $this->hasMany(AlunoCurso::class, 'id_curso', 'id');
    }

    public function totais()
    {
        return $this->withCount([
            'alunos',
            'alunos as alunos_aprovado_count' => function ($query) {
                $query->where('status', 2);
            },
            'alunos as alunos_ativos_count' => function ($query) {
                $query->where('status', 1);
            },
            'alunos as alunos_cancelado_count' => function ($query) {
                $query->where('status', 0);
            }
        ]);
    }

    public function delete()
    {
        if ($this->alunos()->get()->count()) {
            $this->status = 0;
            $this->save();
        } else {
            parent::delete();
        }
    }
}
