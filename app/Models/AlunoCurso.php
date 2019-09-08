<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlunoCurso extends Model
{
    public $table = 'aluno_curso';
    public $timestamps = false;

    protected $dates = [
        'dt_inicio',
        'dt_termino',
        'dt_cancelamento',
    ];
}
