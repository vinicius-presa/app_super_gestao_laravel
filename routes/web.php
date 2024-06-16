<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'sobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', 'LoginController@login')->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', 'ClientesController@clientes')->name('app.clientes');
    Route::get('/fornecedores', 'FornecedoresController@fornecedores')->name('app.fornecedores');
    Route::get('/produtos', 'ProdutosController@produtos')->name('app.produtos');
});

//redirecionamento 

Route::get('rota1', function(){
    return redirect()->route('site.rota2');
})->name('site.rota1');

Route::get('/rota2', function(){
    echo 'Rota2';
})->name('site.rota2');

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