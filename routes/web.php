<?php

use App\Http\Controllers\SewingController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/sewing', [App\Http\Controllers\SewingController::class, 'index'])->name('sewing');
Route::resource('sewing', SewingController::class);
Route::get('/sewing/show/{styleCode}/{trnDate}', [App\Http\Controllers\SewingController::class, 'show'])->name('sewing.show');
Route::post('/sewing/update/{styleCode}/{trnDate}', [App\Http\Controllers\SewingController::class, 'update'])->name('sewing.update');

