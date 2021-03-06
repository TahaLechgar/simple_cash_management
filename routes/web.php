<?php

use App\Http\Controllers\CashHistoryController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/cash_management', [CashHistoryController::class, 'getAll'])->middleware(['auth'])->name('cash_management');
Route::get('/', [CashHistoryController::class, 'index'])->middleware(['auth'])->name('index');
Route::get('/edit/{id}', [CashHistoryController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::get('/add', [CashHistoryController::class, 'add'])->middleware(['auth'])->name('add');
Route::put('/transactions/{cashHistory}', [CashHistoryController::class, 'update'])->middleware(['auth'])->name('update');
Route::post('/transactions', [CashHistoryController::class, 'store'])->middleware(['auth'])->name('store');
Route::delete('/delete/{cashHistory}', [CashHistoryController::class, 'delete'])->middleware(['auth'])->name('delete');

require __DIR__.'/auth.php';
