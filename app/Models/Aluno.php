<?php

namespace estoque\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{

  public function disciplina(){
    return $this->hasMany('\estoque\Models\Disciplina');
  }

/*  public function colegiado(){
    return $this->belongsTo('\estoque\Models\Colegiado');
  }
*/
  public function quest(){
    return $this->hasMany('\estoque\Models\Quest');
  }

  public function alunoDisciplina(){
    return $this->hasMany('\estoque\Models\AlunoDisciplina');
  }
}
