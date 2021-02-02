<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turmas';

    protected $fillable = ['nome', 'descricao', 'id_escolas'];


    /**
     * Relacionamento entre Turmas e Escolas
     * @return array
     */
    public function escolas(){
        return $this->belongsTo(Escola::class, 'id_escolas', 'id');
    }

    public function alunos(){
        return $this->belongsToMany(Aluno::class, 'alunos_turmas_rel', 'id_turmas', 'id_alunos');
    }

     public function disciplinas(){
        return $this->belongsToMany(Disciplina::class, 'disciplinas_turmas_rel', 'id_turmas', 'id_disciplinas');
    }
}
