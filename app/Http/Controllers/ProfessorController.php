<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;

use estoque\Http\Requests;

use estoque\Models\Disciplina;
use estoque\Models\Colegiado;
use estoque\Models\Professor;
use Auth;
use Gate;
use estoque\Models\Quest;
use PDF;

class ProfessorController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  } 

//Função que verifica se o user é professor/coordenador e redireciona com os dados referentes as suas disciplinas e as disciplinas do colegiado, caso seja coordenador.  
  public function professor(){

    if (Gate::denies('is_professor') and Gate::denies('is_coordenador')){
      abort(403);
    } 
      
    $professor = Professor::where('cpf', Auth::user()->cpf)->first();
    $disciplinas = Disciplina::where('professor_id', $professor->id)->get();


    if (Gate::allows('is_coordenador')){
      $disciplinasColegiado = Disciplina::where('colegiado_id', Colegiado::where('coordenador_id', $professor->id)->value('id'))->get();
      return view('quest.professorIndex', compact('disciplinas'))->with('p', $professor)->with('disciplinasColegiado', $disciplinasColegiado);
    } 

    return view('quest.professorIndex', compact('disciplinas'))->with('p', $professor);

  }


//Função que permite ao professor visualizar os dados da disciplina selecionada.
  public function visualiza($id){
    if (Gate::denies('is_professor')){
      abort(403);
    }

    $disciplina = Disciplina::find($id);

    if(empty($disciplina))
      return view('quest.disciplinaInexistente');

    if(Gate::denies('is_coordenador'))
      if($disciplina->professor_id <> Professor::where('cpf', Auth::user()->cpf)->value('id'))
        abort(403);

    if(Gate::allows('is_coordenador'))
      if($disciplina->colegiado_id <> Professor::where('cpf', Auth::user()->cpf)->value('colegiado_id'))
        abort(403);  

    $criticas = Quest::where('disciplina_id', $id)->where('criticas', '<>', '')->select('criticas')->get();
    $sugestoes = Quest::where('disciplina_id', $id)->where('sugestoes', '<>', '')->select('sugestoes')->get();



    return view('quest.visualiza')->with('d', $disciplina)->with('criticas', $criticas)->with('sugestoes', $sugestoes);
  }


//Função que gera um pdf à partir dos html da página da disciplina.
  public function pdf($id){
        $disciplina = Disciplina::find($id);
        $criticas = Quest::where('disciplina_id', $id)->where('criticas', '<>', '')->select('criticas')->get();
        $sugestoes = Quest::where('disciplina_id', $id)->where('sugestoes', '<>', '')->select('sugestoes')->get();
        
        view()->share('d', $disciplina);
        view()->share('criticas', $criticas);
        view()->share('sugestoes', $sugestoes);

        $pdf = PDF::loadView('quest.visualiza');
        return $pdf->download('relatorio.pdf');


  }
}
