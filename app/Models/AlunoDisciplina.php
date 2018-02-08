<?php

namespace estoque\Models;

use Illuminate\Database\Eloquent\Model;

class AlunoDisciplina extends Model
{
  protected $table = 'alunoDisciplina';
  
  public function aluno(){
    return $this->belongsTo('estoque\Models\Aluno');
  }
  public function disciplina(){
    return $this->belongsTo('estoque\Models\Disciplina');
  }
}
