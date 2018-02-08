<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;

use estoque\Http\Requests;

use Auth;
use Gate;
use estoque\Models\Colegiado;
use estoque\Models\Professor;
use estoque\Http\Requests\CoordenadorRequest;

class AdminController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

//Função que verifica se o usuário logado é administrados e redireciona.
  public function admin(){
    if (Gate::denies('is_admin')){
      abort(403);
    }


    return view('quest.adminIndex');
  }

//Função que mostra os coordenadores de curso e a lista de docentes que podem ser escolhidos como tal.
  public function coordenadores(){
    if (Gate::denies('is_admin')){
      abort(403);
    }

    $colegiados = Colegiado::orderBy('nome')->get();
    $professores = Professor::orderBy('nome')->get();

    return view('quest.coordenadores')->with('colegiados', $colegiados)->with('professores', $professores);
  }

//Função que atualiza o coordenador escolhido.
  public function atualiza(CoordenadorRequest $request){
     Colegiado::where('id', $request->colegiado_id)->update(['coordenador_id' => $request->coordenador_id]);
     return redirect('/coordenadores')->withInput();
  }
}
