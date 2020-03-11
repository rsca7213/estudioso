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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cursos/agregar/{id}', 'CursosController@create')->name('agregarCurso');
Route::post('/cursos/agregar/{id}/crear', 'CursosController@store')->name('crearCurso');
Route::get('/cursos/agregar/{user_id}/{curso_id}/evaluaciones', 'EvaluacionesController@create')->name('crearCursoEvaluaciones');
Route::post('/cursos/agregar/{user_id}/{curso_id}/evaluaciones/crear', 'EvaluacionesController@store');
Route::delete('/cursos/agregar/{user_id}/{curso_id}/evaluaciones/borrar/{ev_id}', 'EvaluacionesController@destroy');
Route::patch('/cursos/agregar/{user_id}/{curso_id}/evaluaciones/editar/{ev_id}', 'EvaluacionesController@update');
Route::get('/cursos/ver/{user_id}', 'CursosController@index')->name('verCursos');
Route::delete('/cursos/ver/{user_id}/borrar/{curso_id}', 'CursosController@destroy');