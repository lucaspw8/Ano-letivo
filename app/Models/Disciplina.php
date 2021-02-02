<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $table    = 'disciplinas';
    protected $fillable = ['nome', 'carga_horaria', 'descricao'];

    public function turmas(){
        return $this->belongsToMany(Turma::class, 'disciplinas_turmas_rel', 'id_disciplinas','id_turmas');
    }

    public function professores(){
        return $this->belongsToMany(Professores::class, 'professores_disciplinas_rel',
        'id_disciplinas', 'id_professores');
    }

    public function habilidades(){
        return $this->belongsToMany(Habilidade::class, 'disciplinas_habilidades_rel',
        'id_disciplinas', 'id_habilidades');
    }
}
