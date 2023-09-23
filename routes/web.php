<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

//Task routes
Route::get('/', [TaskController::class, 'index'])->name('task.index');
Route::post('/task/add', [TaskController::class, 'create'])->name('task.create');
Route::put('/task/{taskData}/update', [TaskController::class, 'update'])->name('task.update');
Route::delete('/task/{taskData}/delete', [TaskController::class, 'destroy'])->name('task.destroy');
