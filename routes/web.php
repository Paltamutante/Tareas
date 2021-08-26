<?php


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

Route::get('/','PagesController@inicio');

Route::get('/ejemplo','PagesController@ejemplo')->name('ej1');

Route::get('/ejemplo/detalle/{id}','PagesController@detalle')->name('notas.detalle');

Route::post('/', 'PagesController@crear')->name('notas.crear');

Route::get('/editar/{id}', 'PagesController@editar')->name('notas.editar');

Route::put('/editar/{id}', 'PagesController@update')->name('notas.update');

Route::delete('eliminar/{id}', 'PagesController@eliminar')->name('notas.eliminar');

Route::get('/ejemplo2','PagesController@ejemplo2')->name('ej2');

Route::get('/ejemplo3','PagesController@ejemplo3')->name('ej3');
    
Route::get('/ejemplo4','PagesController@ejemplo4')->name('ej4');

Route::get('/ejemplo5','PagesController@ejemplo5')->name('ej5');

Route::get('/ejemplo6','PagesController@ejemplo6')->name('ej6');

Route::get('/ejemplo7','PagesController@ejemplo7')->name('ej7');
