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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Route
     */
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');

    Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::post('/users/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::post('/users/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/categories', [App\Http\Controllers\CategorieController::class, 'index'])->name('categories');
    Route::get('/categories/create', [App\Http\Controllers\CategorieController::class, 'create'])->name('categories.create');
    Route::get('/categories/edit/{id}', [App\Http\Controllers\CategorieController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/store', [App\Http\Controllers\CategorieController::class, 'store'])->name('categories.store');
    Route::post('/categories/update', [App\Http\Controllers\CategorieController::class, 'update'])->name('categories.update');

    Route::get('/produits', [App\Http\Controllers\ProduitController::class, 'index'])->name('produits');
    Route::get('/produits/create', [App\Http\Controllers\ProduitController::class, 'create'])->name('produits.create');
    Route::get('/produits/edit/{id}', [App\Http\Controllers\ProduitController::class, 'edit'])->name('produits.edit');
    Route::get('/produits/order/{id}', [App\Http\Controllers\ProduitController::class, 'order'])->name('produits.order');
    Route::post('/produits/store_order', [App\Http\Controllers\ProduitController::class, 'store_order'])->name('produits.store_order');
    Route::post('/produits/store', [App\Http\Controllers\ProduitController::class, 'store'])->name('produits.store');
    Route::post('/produits/destroy', [App\Http\Controllers\ProduitController::class, 'destroy'])->name('produits.destroy');
    Route::post('/produits/update', [App\Http\Controllers\ProduitController::class, 'update'])->name('produits.update');

    Route::get('/commandes', [App\Http\Controllers\ProduitController::class, 'index_commandes'])->name('commandes');


    Route::get('/logout', [App\Http\Controllers\LogoutController::class,'perform'])->name('logout.perform');
});
