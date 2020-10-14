<?php

use Illuminate\Support\Facades\Route;

Route::post('/register', 'RegisterController@s')->name('register')->middleware('auth');
Route::any('products/search', 'ProdutoController@search')->name('products.search')->middleware('auth');
Route::resource('products', 'ProdutoController')->middleware('auth');
Route::resource('vendas', 'VendaController')->middleware('auth');
Route::resource('categorias', 'ProdutoCategoriaController')->middleware('auth');
Route::resource('carrinho', 'CarController')->middleware('auth');
Route::resource('locais', 'LocalController')->middleware('auth');
Route::resource('config', 'ConfController')->middleware('auth');

/**
 * Rota Modal id_venda
 */
Route::get('/home/$id', 'HomeController@idModal');


/**
 * Rota Limpar Cache Painel
 */
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('/login', function () {
    return 'Login';
})->name('login');



Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function () {

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('home');
});


Route::get('redirect3', function () {
    return redirect()->route('url.name');
});


Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s) {$idProduct}";
});

Route::get('/categorias/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($prm1) {
    return "Produtos da categoria: {$prm1}";
});

Route::match(['get', 'post'], '/match', function () {
    return 'match';
});

Route::any('/any', function () {
    return 'Any';
});

Route::get('/empresa', function () {
    return view('site.contact');
});

Route::get('/contato', function () {
    return 'Contato';
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

