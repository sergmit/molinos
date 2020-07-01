<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('feedback', 'FeedbackController');

Route::prefix('admin')->group(function() {
    Route::get('/feedback', [AdminController::class, 'index'])->name('admin.main');
    Route::get('/email', [AdminController::class, 'showAdminUpdate'])->name('admin.email.show');
    Route::put('/email', [AdminController::class, 'updateAdminEmail']);
    Route::post('/answer', [AdminController::class, 'answer']);
});

Route::get('/files/{file}', [FileController::class, 'index']);
