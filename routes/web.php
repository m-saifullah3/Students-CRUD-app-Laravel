<?php

use App\Http\Controllers\StudentsController;
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

Route::get('/', [StudentsController::class, 'index'])->name('home');

Route::get('/students', [StudentsController::class, 'index'])->name('show_students');

Route::get('/student/create', [StudentsController::class, 'create'])->name('create_student');
Route::post('/student/create', [StudentsController::class, 'store']);

Route::get('/student/{id}/edit', [StudentsController::class, 'edit'])->name('edit_student');
Route::post('/student/{id}/edit', [StudentsController::class, 'update']);

Route::post('/student/{id}/delete', [StudentsController::class, 'destroy'])->name('delete_student');
