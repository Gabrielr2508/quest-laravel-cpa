<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('test');
});

Route::get('/contato', function(){
  return 'Página de contato.';
});

Route::get('empresa', function(){
  return 'Página da Empresa.';
});

Route::post('cadastrar/user', function(){
  return 'Cadastrando Usuário...';
});

Route::match(['post', 'get'], '/match', function(){
  return 'Mina rota match';
});

Route::any('any', function(){
  return 'Rota any';
});

Route::get('produtos', function(){
  return 'Listagem dos produtos.';
});

Route::get('produtos/adicionar', function(){
  return 'Formulário.';
});

Route::get('produtos/editar/{idProduto}', function($idProduto){
  return "Editar o produto: {$idProduto}";
})
->where('idProduto', '[0-9]+');

Route::get('produtos/deletar/{idProduto?}', function($idProduto = ''){
  return "Deletar o produto: {$idProduto}";
});

Route::get('produtos/{idProduto}/imagem/{idImagem}', function($idProduto, $idImagem){
  return "Produto: {$idProduto}, Imagem: {$idImagem}";
});

Route::group(['prefix' => 'painel', 'middleware' => 'my-middleware'], function(){
    Route::get('/', function(){
      return view('painel.home.index');
    });

    Route::get('financeiro', function(){
      return view('painel.financeiro.index');
    });

    Route::get('usuarios', function(){
      return 'Usuários';
    });
});

Route::get('/login', function(){
  return 'Formulario de Login';
});

Route::get('produtos', 'ProdutosController@index');
Route::get('produtos/create', 'ProdutosController@create');
Route::post('produtos/create', 'ProdutosController@store');
Route::get('produtos/{idProduto}', 'ProdutosController@show');
Route::get('produtos/edit/{idProduto}', 'ProdutosController@edit');
*/
Route::get('/', 'QuestHomeController@home');

Route::get('/aluno', 'AlunoController@aluno');
Route::get('/aluno/edita/{disciplina_id}', 'AlunoController@edita')->where('{disciplina_id}', '[0-9]+');
Route::post('/aluno/adiciona', 'AlunoController@adiciona');

Route::get('/professor', 'ProfessorController@professor');
Route::get('/professor/visualiza/{disciplina_id}', 'ProfessorController@visualiza')->where('{disciplina_id}', '[0-9]+');
Route::get('/download/{disciplina_id}', 'ProfessorController@pdf')->where('{disciplina_id}', '[0-9]+');

Route::get('/admin', 'AdminController@admin');
Route::get('/coordenadores', 'AdminController@coordenadores');
Route::post('/coordenadores/atualiza', 'AdminController@atualiza');

//Route::get('/graficos', 'QuestHomeController@graficos');

//Route::get('/produtos', 'ProdutoController@lista');
//Route::get('/produtos/mostra/{idProduto}', 'ProdutoController@mostra')->where('idProduto', '[0-9]+');
//Route::get('/produtos/remove/{idProduto}', 'ProdutoController@remove')->where('idProduto', '[0-9]+');
//Route::get('/produtos/novo', 'ProdutoController@novo');
//Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
//Route::get('/produtos/edita/{idProduto}', 'ProdutoController@edita')->where('idProduto', '[0-9]+');
//Route::post('/produtos/altera', 'ProdutoController@altera');

//Route::get('login', 'LoginController@form');
//Route::post('login', 'LoginController@login');
Route::get('/logout', function() {
  return \Auth::logout;
});
Route::auth();

Route::get('/planilha', 'planilhaController@importExport');
Route::post('importExcel', 'CsvImportController@store');
//Route::get('/home', 'HomeController@index');
