<?php

use App\Http\Controllers\ARController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [ARController::class, 'index'])->name('proculture');

Route::get('/ar/{product:slug}', [ARController::class, 'show'])->name('ar.show');
Route::get('/ar/detail/{product:slug}', [ARController::class, 'detail'])->name('ar.detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(
    ['middleware' => 'auth', 'prefix' => 'admin'],
    function () {

        Route::get('/', function () {
            return view('dash');
        })->middleware(['auth'])->name('dashboard');

        Route::resource('products', ProductController::class);
    }
);

require __DIR__ . '/auth.php';
