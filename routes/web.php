<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('home');
});

//Multiple Route
Route::get('/allPicture', [BandController::class, 'index'])->name('all.multipic');
Route::get('/user/logout', [BandController::class, 'logout'])->name('user.logout');
Route::post('/insertImage', [BandController::class, 'insert']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
