<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;

use estoque\Http\Requests;
use Input;
use estoque\Models\Colegiado;
use DB;
use Excel;
use Gate;

class planilhaController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

//Função que verifica se o user é administrador e redireciona.
	public function importExport()
	{
    if (Gate::denies('is_admin')){
      abort(403);
    } 
		return view('quest.planilha');
	}
/*	public function importExcel()
	{
    DB::connection()->disableQueryLog();
    ini_set('memory_limit',-1);
    ini_set('max_execution_time', 300);
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
      Excel::filter('chunk')->load($path)->chunk(250, function($data)
      {
          foreach ($data as $key => $value) {
             $insert[] = ['nome' => $value->orgao_ofertante];
  				}
  				if(!empty($insert)){
  					DB::table('colegiados')->insert($insert);

  				}
      });
      dd('Insert gravado com sucesso.');
		}
  return back();
	}*/

}
