<?php

use App\Http\Controllers\TodosAppController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('index', [TodosAppController::class, 'index'])->name('todos.index');

Route::get('index/{todo}', [TodosAppController::class, 'show'])->name('todos.show');

Route::get('new-todo', [TodosAppController::class, 'create'])->name('todos.create');

Route::post('store-todo', [TodosAppController::class, 'store'])->name('todos.store');

Route::get('index/{todo}/edit', [TodosAppController::class, 'edit'])->name('todos.edit');

Route::post('update-todo/{todo}', [TodosAppController::class, 'update'])->name('todos.update');

Route::get('index/{todo}/delete', [TodosAppController::class, 'destroy'])->name('todos.destroy');

Route::get('index/{todo}/complete', [TodosAppController::class, 'complete'])->name('todos.complete');
Route::get('index/{todo}/recomplete', [TodosAppController::class, 'recomplete'])->name('todos.recomplete');
