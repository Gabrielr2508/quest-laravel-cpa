<?php

namespace estoque\Models;

use Illuminate\Database\Eloquent\Model;

class Colegiado extends Model
{
    protected $fillable = array('nome');

/*    public function aluno(){
      return $this->hasMany('estoque\Models\Aluno');
    }*/
    public function professor(){
      return $this->hasMany('estoque\Models\Professor');
    }

    public function disciplina(){
      return $this->hasMany('\estoque\Models\Disciplina');
    }
}
