<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class, 'todo'])->name('todos');
Route::post('/create', [TodoController::class, 'create'])->name('create');
Route::post('/delete/{id}', [TodoController::class, 'destroy'])->name('delete');
