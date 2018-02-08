<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;

use estoque\Http\Requests;


use Auth;
use Gate;



//use Khill\Lavacharts\Lavacharts;
//use DB;

class QuestHomeController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

//Função que redireciona o usuário para a página inicial de acordo com seu tipo.
  public function home(){
    if (Gate::allows('is_admin')){
      return redirect( '/admin');

    }

    if (Gate::allows('is_professor')){
      return redirect('/professor');
    }
    
    if (Gate::allows('is_aluno')){

      return redirect('/aluno');
    }

   

    return abort(403);
  }





  /*public function graficos(){
    $total = DB::select('select periodo, COUNT( * ) AS `quantidade` FROM disciplinas GROUP BY periodo LIMIT 0 , 30');
    dd($total);
    //dd($agregado->disciplina_id->groupBy('periodo'));
    return view('quest.graficos')->with('total', $total);
  }*/


}
