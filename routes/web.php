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
 use App\Http\Controllers\Controller;
use App\Http\Controllers\bookController;

/**Rota da pagina inicial */
Route::get('/', [bookController::class,'index']);
/**Rota da pagina de cadastro de  livros */
Route::get('/books/create',[bookController::class,'create'])->middleware('auth');
/**Rota do metodo de  cadastro de livros */
Route::post('/books/dashboard',[bookController::class,'store'])->middleware('auth');
/**Rota do metodo de deletar livros  */
Route::delete('/books/{id}',[bookController::class,'destroy'])->middleware('auth');

/**Rota da pagina de edicao de livros e o */
Route::get('/books/edit/{id}',[bookController::class,'edit'])->middleware('auth');
Route::put('/books/update/{id}',[bookController::class,'update'])->middleware('auth');


/**Rota da pagina do administrador */
Route::get('/books/dashboard',[bookController::class,'dashboard'])->middleware('auth');



/**Rota da pagina de leitura  */
Route::get('/books/read/{id}',[bookController::class,'read'])->middleware('auth');

 
 