<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('/', [TestController::class, 'index']);
Route::post('/test', [TestController::class, 'store'])->name('test.store');
Route::get('/test/result/{user}', [TestController::class, 'result'])->name('test.result');

Route::get('admin', [TestController::class, 'indexadmin'])->name('admin.index');
Route::get('admin/create', [TestController::class, 'create'])->name('admin.create');
Route::post('admin', [TestController::class, 'simpansoaladmin'])->name('admin.store');
Route::get('admin/{question}/edit', [TestController::class, 'edit'])->name('admin.edit');
Route::put('admin/{question}', [TestController::class, 'update'])->name('admin.update');
Route::delete('admin/{question}', [TestController::class, 'destroy'])->name('admin.destroy');
