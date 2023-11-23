<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index']);
Route::get('/index', [UserController::class, 'index']);

Route::get('/categories/add', [CategoryController::class, 'add']);
Route::post('/categories/add', [CategoryController::class, 'create']);

Route::get('/categories/show', [CategoryController::class, 'show']);
Route::get('/categories/delete/{id}', [CategoryController::class, 'delete']);

Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/categories/edit/{id}', [CategoryController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
