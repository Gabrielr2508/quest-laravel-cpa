<?php

namespace estoque\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
  public function aluno(){
    return $this->belongsTo('estoque\Models\Aluno');
  }
  public function professor(){
    return $this->belongsTo('estoque\Models\Professor');
  }
  public function disciplina(){
    return $this->belongsTo('\estoque\Models\Disciplina');
  }

  protected $fillable = array('quest1', 'quest2', 'quest3', 'quest4', 'quest5', 'quest6', 'quest7', 'quest8', 'quest9', 'quest10',
                              'quest11', 'quest12', 'quest13', 'quest14', 'quest15', 'auto_avaliacao', 'criticas', 'sugestoes',
                            'professor_id', 'aluno_id', 'disciplina_id');
}
