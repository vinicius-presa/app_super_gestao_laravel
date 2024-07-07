<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'sobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');    

Route::middleware('autenticacao')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');    
    Route::get('/cliente', 'ClientesController@index')->name('app.cliente');
    
    Route::get('/fornecedor/{msg?}', 'FornecedoresController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedoresController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedoresController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedoresController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedoresController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedoresController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedoresController@excluir')->name('app.fornecedor.excluir');

    //produtos
    Route::resource('produto', 'ProdutoController');
    
});


Route::fallback(function(){
    echo 'A rota nao existe. <a href="'.route('site.index').'">clique aqui</a> para ser redirecionado';
});










/*
Route::get(
    '/contato/{nome}/{categoria_id}',
    function(
        string $nome,
        int $categoria_id = 1
         ){
        echo "Estamos aqui $nome - $categoria_id";
    }
)->where('nome','[A-Za-z]+')->where('categoria_id', '[0-9]+');
*/