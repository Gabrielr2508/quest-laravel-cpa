<?php

namespace estoque\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
  protected $table = 'professores';

  public function disciplina(){
    return $this->hasMany('\estoque\Models\Disciplina');
  }

  public function colegiado(){
    return $this->belongsTo('\estoque\Models\Colegiado');
  }

  public function quest(){
    return $this->hasMany('\estoque\Models\Quest');
  }
}
