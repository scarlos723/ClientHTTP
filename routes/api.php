<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\SubcategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('vercursos/', [CursoController::class,'verCursosApi']);

Route::get('categorias/',[CategoriaController::class,'verCategorias']);

Route::get('categoria/{id}',[CategoriaController::class,'verCategoria']);

Route::get('subcategorias/',[SubcategoriaController::class,'verSubcategorias']);

Route::get('subcategoria/{id}',[SubcategoriaController::class,'verSubcategoria']);

Route::get('cursos/',[CursoController::class,'verCursos']);

Route::get('curso/{id}',[CursoController::class,'verCurso']);
