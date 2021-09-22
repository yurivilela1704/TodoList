<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

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

//pelo que entendi o middleware é usado para restringir a pagina para usuarios verificados e logados
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //route for index
    Route::get('/dashboard', [TasksController::class, 'index'])->name('dashboard');

    //route for add a new task
    Route::get('/task', [TasksController::class, 'add'])->name('add');

    //route to save a created task
    Route::post('/task', [TasksController::class, 'create'])->name('create');

    //route to edit a created task
    Route::get('/task/{task}', [TasksController::class, 'edit']);

    //route to save a edited task
    Route::post('/task/{task}', [TasksController::class, 'update']);
});
