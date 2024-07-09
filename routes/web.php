<?php

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

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('dashboard/user', UserController::class)->name('user');

Route::controller(UserController::class)->name('user.')->prefix('dashboard/user')->group(function () {
    Route::post('/import', [UserController::class, 'import'])->name('import');
    Route::post('/export', [UserController::class, 'export'])->name('export');
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
});
