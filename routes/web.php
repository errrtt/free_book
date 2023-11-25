<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
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

Route::get('/books/add', [BookController::class, 'add']);
Route::post('/books/add', [BookController::class, 'create']);
Route::get('/books', [BookController::class, 'show_books']);

Route::get('/books/delete/{id}', [BookController::class, 'delete']);
Route::get('/books/edit/{id}', [BookController::class, 'edit']);
Route::post('/books/edit/{id}', [BookController::class, 'update']);

Route::get('/books/search', [UserController::class, 'search']);
Route::get('/books/category', [UserController::class, 'search_category']);

Route::get('/users/show', [AdminController::class, 'show_user']);

Auth::routes();

Route::get('/home', [UserController::class, 'index']);
