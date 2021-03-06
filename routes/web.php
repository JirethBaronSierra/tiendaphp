<?php

use Illuminate\Support\Facades\Route;
use App\Models\Marca;
use App\Models\Categoria;
use App\Http\Controllers\ProductoController;
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

});

Route::get('prueba' , function(){
    //selecionar marcas 
    $marcas = Marca::all();
    //selecionar categorias
    $categorias = Categoria::all();
    //ingresar marcas y categorias a la vista 
    return view('productos.create')
      ->with('categorias',$categorias)
      ->with('marcas', $marcas);
});
//Rutas REST 
Route::resource('productos', ProductoController::class);