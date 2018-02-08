<?php

namespace estoque\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{

  protected $fillable = array('nome');


  public function aluno(){
    return $this->hasMany('estoque\Models\Aluno');
  }
  public function professor(){
    return $this->belongsTo('estoque\Models\Professor');
  }
  public function colegiado(){
    return $this->belongsTo('\estoque\Models\Colegiado');
  }
  public function quest(){
    return $this->hasMany('\estoque\Models\Quest');
  }
  public function alunoDisciplina(){
    return $this->hasMany('\estoque\Models\AlunoDisciplina');
  }
}
