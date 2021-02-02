<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professores extends Model
{
    use HasFactory;

    protected $table = 'professores';
    protected $fillable = ['nome', 'matricula', 'descricao'];

    public function disciplinas(){
        return $this->belongsToMany(Disciplina::class, 'professores_disciplinas_rel',
        'id_professores', 'id_disciplinas');
    }
}
