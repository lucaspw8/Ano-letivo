<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;
    
    protected $table = 'escolas';

    protected $fillable = ['nome', 'descricao'];

    public function turmas(){
        return $this->hasMany(Turma::class, 'id_escolas', 'id');
    }
}
