<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;

use estoque\Http\Requests;

use Auth;
use Gate;
use estoque\Models\AlunoDisciplina;
use estoque\Models\Aluno;
use estoque\Models\Quest;
use estoque\Models\Disciplina;
use estoque\Http\Requests\QuestRequest;

class AlunoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

//Função que verifica se o user é aluno e redireciona, ao mesmo tempo que busca os dados das disciplinas cursadas pelo mesmo.
  public function aluno(){
    if (Gate::denies('is_aluno')){
      abort(403);
    } 
     
    $aluno = Aluno::where('cpf', Auth::user()->cpf)->first();
    $alunoDisciplina = AlunoDisciplina::where('aluno_id', $aluno->id)->get();

    return view('quest.alunoIndex', compact('alunoDisciplina'))->with('a', $aluno);
  }

//Função que cria a quest no banco de dados utilizando os dados obtidos. 
  public function adiciona(QuestRequest $request){
    Quest::create($request->all());
    return redirect('/aluno')->withInput();
  }


//Função que gerencia o formulário de avaliação.
  public function edita($id){
    if (Gate::denies('is_aluno')){
      abort(403);
    }

    $disciplina = Disciplina::find($id);

    if(empty($disciplina))
      return view('quest.disciplinaInexistente');
    
    $aluno = Aluno::where('cpf', Auth::user()->cpf)->first();

    if(is_null(AlunoDisciplina::where('aluno_id', $aluno->id)->where('disciplina_id', $disciplina->id)->first()))
      abort(403);   

    return view('quest.edita')->with('d', $disciplina)->with('a', $aluno);
  }
}
