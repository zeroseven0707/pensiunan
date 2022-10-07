<?php

use App\Http\Controllers\PensiunanController;
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

Route::get('/',[PensiunanController::class, 'index']);
Route::post('import',[PensiunanController::class, 'import'])->name('import');
Route::post('store',[PensiunanController::class, 'store'])->name('store');
Route::get('create',[PensiunanController::class, 'create'])->name('create');
Route::get('delete/{id}',[PensiunanController::class, 'destroy'])->name('delete');
Route::get('edit/{id}',[PensiunanController::class, 'edit']);
Route::post('update/{id}',[PensiunanController::class, 'update']);