<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table    = 'alunos';
    protected $fillable = ['nome', 'matricula','descricao'];

    public function turmas(){
        return $this->belongsToMany(Turma::class,'alunos_turmas_rel', 'id_alunos', 'id_turmas');
    }
}
