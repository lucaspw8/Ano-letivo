<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    use HasFactory;

    protected $table = 'habilidades';
    protected $fillable = ['nome', 'pontuacao', 'descricao'];

    public function disciplinas(){
        return $this->belongsToMany(Disciplina::class, 'disciplinas_habilidades_rel', 
        'id_habilidades', 'id_disciplinas');
    }
}
