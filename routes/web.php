<?php

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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Route
     */
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/categories', [App\Http\Controllers\CategorieController::class, 'index'])->name('categories');
    Route::get('/categories/create', [App\Http\Controllers\CategorieController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [App\Http\Controllers\CategorieController::class, 'store'])->name('categories.store');
    Route::get('/produits', [App\Http\Controllers\ProduitController::class, 'index'])->name('produits');
    Route::get('/produits/create', [App\Http\Controllers\ProduitController::class, 'create'])->name('produits.create');
    Route::post('/produits/store', [App\Http\Controllers\ProduitController::class, 'store'])->name('produits.store');

    Route::get('/logout', [App\Http\Controllers\LogoutController::class,'perform'])->name('logout.perform');
});
