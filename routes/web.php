<?php

use App\Http\Controllers\TodosController;
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
    return redirect('/todos');
});

Route::get('/todos', [TodosController::class, 'index']);
Route::get('/todos/create', [TodosController::class, 'create']);
Route::post('/todos', [TodosController::class, 'store']);
Route::get('/todos/{todo}/edit', [TodosController::class, 'edit']);
Route::patch('/todos/{todo}', [TodosController::class, 'update']);
Route::delete('/todos/{todo}', [TodosController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
