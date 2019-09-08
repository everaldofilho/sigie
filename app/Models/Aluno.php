<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public $table = 'aluno';
    public $timestamps = false;
    
    protected $dates = [
        'data_nascimento',
    ];

    public function curso()
    {
        return $this->hasMany(AlunoCurso::class, 'id_aluno', 't.id');
    }
}
