<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [TaskController::class, 'index'])->name('index');

Route::prefix('tasks')->group(function () {
    Route::get('/add', [TaskController::class, 'addTask'])->name('addTask');
    Route::post('/create', [TaskController::class, 'addNewTask'])->name('addNewTask');
    Route::get('/{id}/edit', [TaskController::class, 'editTask'])->name('editTask');
    
    Route::post('/{id}/update', [TaskController::class, 'updateTask'])->name('updateTask');
    
    Route::delete('/{id}/delete', [TaskController::class, 'deleteTask'])->name('deleteTask');
});


