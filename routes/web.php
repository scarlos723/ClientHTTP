<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\SubcategoriaController;
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
    return view('index');
});

Route::resource('instructors',InstructorController::class);
Route::post('asignarcurso/{id}',[InstructorController::class,'asignarCurso']);//se asigna un curso a un instructor, se pasa el id del instructor


Route::resource('cursos',CursoController::class);
Route::resource('subcategorias',SubcategoriaController::class);
Route::resource('categorias',CategoriaController::class);



Route::post('agregarnivel/{id}',[SubcategoriaController::class,'agregarNivel']); //crear un nivel, se pasa el id de la subcategoria

Route::post('agregarnivelsubcat/{id}',[CursoController::class, 'agregarNivelSubcat']); //agregar un nivel de subcategoria, se pasa el id del curso

Route::post('agregarSubcategoria/{id}',[CategoriaController::class,'agregarSubcategoria']);  //agregar una subcategoria a la categoria, se pasa el id de categoria